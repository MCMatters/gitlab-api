<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const null;
use function array_filter;

class BroadcastMessage extends AbstractResource
{
    public function list()
    {
        return $this->requestGet('broadcast_messages');
    }

    public function get(int $id)
    {
        return $this->requestGet("broadcast_messages/{$id}");
    }

    public function create(
        string $message,
        $startsAt = null,
        $endsAt = null,
        string $color = null,
        string $font = null
    ) {
        return $this->requestPost(
            'broadcast_messages',
            array_filter([
                'message'   => $message,
                'starts_at' => $startsAt,
                'ends_at'   => $endsAt,
                'color'     => $color,
                'font'      => $font,
            ])
        );
    }

    public function update(int $id, array $data = [])
    {
        return $this->requestPut("broadcast_messages/{$id}", $data);
    }

    public function delete(int $id)
    {
        return $this->requestDelete("broadcast_messages/{$id}");
    }
}
