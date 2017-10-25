<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const false, null, true;
use function array_filter;

class SystemHook extends AbstractResource
{
    public function list()
    {
        return $this->requestGet('hooks');
    }

    public function create(
        string $url,
        string $token = null,
        bool $pushEvents = true,
        bool $tagPushEvents = false,
        bool $sslVerify = false
    ) {
        return $this->requestPost(
            'hooks',
            array_filter([
                'url'                     => $url,
                'token'                   => $token,
                'push_events'             => $pushEvents,
                'tag_push_events'         => $tagPushEvents,
                'enable_ssl_verification' => $sslVerify,
            ])
        );
    }

    public function test(int $id)
    {
        return $this->requestGet("hooks/{$id}");
    }

    public function delete(int $id)
    {
        return $this->requestDelete("hooks/{$id}");
    }
}
