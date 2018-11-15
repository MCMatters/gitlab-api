<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\Ticl\Client;
use const true;
use function preg_replace, rawurlencode, rtrim;

/**
 * Class AbstractResource
 *
 * @package McMatters\GitlabApi\Resources
 */
abstract class AbstractResource
{
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
            'headers' => ['PRIVATE-TOKEN' => $token],
            'filter_nulls' => true,
        ]);
    }

    /**
     * @param string $url
     * @param mixed $replacements
     *
     * @return string
     */
    protected function encodeUrl(string $url, $replacements = []): string
    {
        foreach ((array) $replacements as $key => $replacement) {
            $url = preg_replace(
                '/{(?<key>\w+)}/',
                rawurlencode((string) $replacement),
                $url,
                1
            );
        }

        return $url;
    }
}
