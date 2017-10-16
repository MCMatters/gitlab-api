<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

class Repository extends AbstractResource
{
    public function listTree($id, array $filters = [])
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/repository/tree", $filters);
    }

    public function blob($id, string $sha)
    {
        $id = $this->encode($id);

        // todo: https://gitlab.com/gitlab-org/gitlab-ce/issues/26561
        return $this->requestGet("projects/{$id}/repository/blobs/{$sha}");
    }

    public function rawBlob($id, string $sha)
    {
        $id = $this->encode($id);

        // todo: https://gitlab.com/gitlab-org/gitlab-ce/issues/26561
        return $this->requestGet("projects/{$id}/repository/blobs/{$sha}/raw");
    }

    public function archive($id)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/repository/archive");
    }

    public function compare($id, string $from, string $to)
    {
        $id = $this->encode($id);

        return $this->requestGet(
            "projects/{$id}/repository/compare",
            ['from' => $from, 'to' => $to]
        );
    }

    public function contributors($id)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/repository/contributors");
    }
}
