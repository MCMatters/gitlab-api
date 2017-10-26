<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const null;
use function array_filter;

class Runner extends AbstractResource
{
    public function list(string $scope = null)
    {
        return $this->requestGet('runners', array_filter(['scope' => $scope]));
    }

    public function all(string $scope = null)
    {
        return $this->requestGet('runners/all', array_filter(['scope' => $scope]));
    }

    public function get(int $id)
    {
        return $this->requestGet("runners/{$id}");
    }

    public function update(int $id, array $data = [])
    {
        return $this->requestPut("runners/{$id}", $data);
    }

    public function delete(int $id)
    {
        return $this->requestDelete("runners/{$id}");
    }

    public function listFromProjects($id)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/runners");
    }

    public function enableInProject($id, int $runnerId)
    {
        return $this->requestPost(
            "projects/{$id}/runners",
            ['runner_id' => $runnerId]
        );
    }

    public function disableInProject($id, int $runnerId)
    {
        return $this->requestDelete("projects/{$id}/runners/{$runnerId}");
    }
}
