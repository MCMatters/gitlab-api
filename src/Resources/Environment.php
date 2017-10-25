<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const null;
use function array_filter;

class Environment extends AbstractResource
{
    public function list($id)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/:{$id}/environments");
    }

    public function create($id, string $name, string $externalUrl = null)
    {
        $id = $this->encode($id);

        return $this->requestPost(
            "projects/{$id}/environment",
            array_filter(['name' => $name, 'external_url' => $externalUrl])
        );
    }

    public function update(
        $id,
        int $environmentId,
        string $name = null,
        string $externalUrl = null
    ) {
        $id = $this->encode($id);

        return $this->requestPut(
            "projects/{$id}/environments/{$environmentId}",
            array_filter(['name' => $name, 'external_url' => $externalUrl])
        );
    }

    public function delete($id, int $environmentId)
    {
        $id = $this->encode($id);

        return $this->requestDelete("projects/{$id}/environments/{$environmentId}");
    }

    public function stop($id, int $environmentId)
    {
        $id = $this->encode($id);

        return $this->requestPost("projects/{$id}/environments/{$environmentId}/stop");
    }
}
