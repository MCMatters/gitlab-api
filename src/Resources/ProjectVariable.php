<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

class ProjectVariable extends AbstractResource
{
    public function list($id)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/variables");
    }

    public function get($id, string $key)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/variables/{$key}");
    }

    public function create($id, string $key, string $value, bool $protected = false)
    {
        $id = $this->encode($id);

        return $this->requestPost(
            "projects/{$id}/variables",
            ['key' => $key, 'value' => $value, 'protected' => $protected]
        );
    }

    public function update($id, string $key, string $value, bool $protected = false)
    {
        $id = $this->encode($id);

        return $this->requestPut(
            "projects/{$id}/variables",
            ['key' => $key, 'value' => $value, 'protected' => $protected]
        );
    }

    public function delete($id, string $key)
    {
        $id = $this->encode($id);

        return $this->requestDelete("projects/{$id}/variables/{$key}");
    }
}
