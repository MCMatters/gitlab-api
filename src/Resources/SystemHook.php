<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const false, null, true;
use function array_filter;

/**
 * Class SystemHook
 *
 * @package McMatters\GitlabApi\Resources
 */
class SystemHook extends AbstractResource
{
    /**
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list(): array
    {
        return $this->requestGet($this->getUrl());
    }

    /**
     * @param string $url
     * @param string|null $token
     * @param bool $pushEvents
     * @param bool $tagPushEvents
     * @param bool $sslVerify
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create(
        string $url,
        string $token = null,
        bool $pushEvents = true,
        bool $tagPushEvents = false,
        bool $sslVerify = false
    ): array {
        return $this->requestPost(
            $this->getUrl(),
            array_filter([
                'url'                     => $url,
                'token'                   => $token,
                'push_events'             => $pushEvents,
                'tag_push_events'         => $tagPushEvents,
                'enable_ssl_verification' => $sslVerify,
            ])
        );
    }

    /**
     * @param int $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function test(int $id): array
    {
        return $this->requestGet($this->getUrl($id));
    }

    /**
     * @param int $id
     *
     * @return int
     * @throws RequestException
     */
    public function delete(int $id): int
    {
        return $this->requestDelete($this->getUrl($id));
    }

    /**
     * @param int|null $id
     *
     * @return string
     */
    protected function getUrl(int $id = null): string
    {
        return null !== $id ? "hooks/{$id}" : 'hooks';
    }
}
