<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const null;

class Tag extends AbstractResource
{
    public function list($id)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/repository/tags");
    }

    public function get($id, string $name)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/repository/tags/{$name}");
    }

    public function create(
        $id,
        string $name,
        string $ref,
        string $message = null,
        string $description = null
    ) {
        $id = $this->encode($id);

        return $this->requestPost(
            "projects/{$id}/repository/tags",
            [
                'name'        => $name,
                'ref'         => $ref,
                'message'     => $message,
                'description' => $description,
            ]
        );
    }

    public function delete($id, string $name)
    {
        $id = $this->encode($id);

        return $this->requestDelete("projects/{$id}/repository/tags/{$name}");
    }

    public function createRelease($id, string $name, string $description)
    {
        $id = $this->encode($id);

        return $this->requestPost(
            "projects/{$id}/repository/tags/{$name}/release",
            ['description' => $description]
        );
    }

    public function updateRelease($id, string $name, string $description)
    {
        $id = $this->encode($id);

        return $this->requestPut(
            "projects/{$id}/repository/tags/{$name}/release",
            ['description' => $description]
        );
    }
}
