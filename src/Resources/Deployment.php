<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

class Deployment extends AbstractResource
{
    public function list($id)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/deployments");
    }

    public function get($id, int $deploymentId)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/deployments/{$deploymentId}");
    }
}
