<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const false;

class DeployKey extends AbstractResource
{
    public function list()
    {
        return $this->requestGet('deploy_keys');
    }

    public function projectList($id)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/deploy_keys");
    }

    public function get($id, int $keyId)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/deploy_keys/{$keyId}");
    }

    public function create($id, string $title, string $key, bool $canPush = false)
    {
        $id = $this->encode($id);

        return $this->requestPost(
            "projects/{$id}/deploy_keys",
            [
                'title'    => $title,
                'key'      => $key,
                'can_push' => $canPush,
            ]
        );
    }

    public function delete($id, int $keyId)
    {
        $id = $this->encode($id);

        return $this->requestDelete("projects/{$id}/deploy_keys/{$keyId}");
    }

    public function enable($id, int $keyId)
    {
        $id = $this->encode($id);

        return $this->requestPost("projects/{$id}/deploy_keys/{$keyId}/enable");
    }
}
