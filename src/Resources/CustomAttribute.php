<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

class CustomAttribute extends AbstractResource
{
    public function list(int $id)
    {
        return $this->requestGet("users/{$id}/custom_attributes");
    }

    public function get(int $id, string $key)
    {
        return $this->requestGet("users/{$id}/custom_attributes/{$key}");
    }

    public function set(int $id, string $key, string $value)
    {
        return $this->requestPut(
            "users/{$id}/custom_attributes/{$key}",
            ['value' => $value]
        );
    }

    public function delete(int $id, string $key)
    {
        return $this->requestDelete("users/{$id}/custom_attributes/{$key}");
    }
}
