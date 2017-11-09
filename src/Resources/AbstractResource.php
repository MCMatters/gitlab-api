<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use GuzzleHttp\Client;
use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use McMatters\GitlabApi\Resources\Traits\DateTrait;
use McMatters\GitlabApi\Resources\Traits\EncodingDataTrait;
use Throwable;
use function json_decode, json_last_error, json_last_error_msg, rtrim;

/**
 * Class AbstractResource
 *
 * @package McMatters\GitlabApi\Resources
 */
abstract class AbstractResource
{
    use DateTrait, EncodingDataTrait;

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * AbstractResource constructor.
     *
     * @param string $url
     * @param string $token
     */
    public function __construct(string $url, string $token)
    {
        $url = rtrim($url, '/').'/api/v4/';

        $this->httpClient = new Client([
            'base_uri' => $url,
            'headers'  => [
                'PRIVATE-TOKEN' => $token,
            ],
        ]);
    }

    /**
     * @param string $uri
     * @param array $query
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    protected function requestGet(string $uri, array $query = []): array
    {
        try {
            $response = $this->httpClient->get(
                $uri,
                ['query' => $query]
            );

            $content = $response->getBody()->getContents();

            return $this->parseJson($content);
        } catch (Throwable $e) {
            $this->throwRequestException($e);
        }
    }

    /**
     * @param string $uri
     * @param array $body
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    protected function requestPost(string $uri, array $body = []): array
    {
        try {
            $response = $this->httpClient->post($uri, ['json' => $body]);

            $content = $response->getBody()->getContents();

            return $this->parseJson($content);
        } catch (Throwable $e) {
            $this->throwRequestException($e);
        }
    }

    /**
     * @param string $uri
     * @param array $body
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    protected function requestPut(string $uri, array $body = []): array
    {
        try {
            $response = $this->httpClient->put($uri, ['json' => $body]);

            $content = $response->getBody()->getContents();

            return $this->parseJson($content);
        } catch (Throwable $e) {
            $this->throwRequestException($e);
        }
    }

    /**
     * @param string $uri
     * @param array $query
     *
     * @return int
     * @throws RequestException
     */
    protected function requestDelete(string $uri, array $query = []): int
    {
        try {
            $response = $this->httpClient->delete($uri, ['query' => $query]);

            return $response->getStatusCode();
        } catch (Throwable $e) {
            $this->throwRequestException($e);
        }
    }

    /**
     * @param string $content
     *
     * @return array
     * @throws ResponseException
     */
    protected function parseJson(string $content): array
    {
        $content = trim($content);

        if ('' === $content) {
            return [];
        }

        $content = json_decode($content, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new ResponseException(json_last_error_msg());
        }

        return $content;
    }

    /**
     * @param Throwable $e
     *
     * @throws RequestException
     */
    protected function throwRequestException(Throwable $e)
    {
        throw new RequestException(
            $this->getErrorMessage($e),
            $this->getErrorCode($e),
            $e
        );
    }

    /**
     * @param Throwable $e
     *
     * @return string
     */
    protected function getErrorMessage(Throwable $e): string
    {
        $message = '';

        if (is_callable([$e, 'getResponse'])) {
            $response = $e->getResponse();

            try {
                $message = $response->getBody()->getContents();
            } catch (Throwable $x) {
                $message = $e->getMessage();
            }
        }

        return $message ?: $e->getMessage();
    }

    /**
     * @param Throwable $e
     *
     * @return int
     */
    protected function getErrorCode(Throwable $e): int
    {
        if (is_callable([$e, 'getStatusCode'])) {
            $code = $e->getStatusCode();
        } else {
            $code = $e->getCode();
        }

        return $code >= 400 && $code <= 599 ? (int) $code : 500;
    }
}
