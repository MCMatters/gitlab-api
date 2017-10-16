<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const false;

class Branch extends AbstractResource
{
    public function list($id)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/repository/branches");
    }

    public function get($id, string $branch)
    {
        list($id, $branch) = $this->encode([$id, $branch]);

        return $this->requestGet("projects/{$id}/repository/branches/{$branch}");
    }

    public function create($id, string $branch, string $ref)
    {
        $id = $this->encode($id);

        return $this->requestPost(
            "projects/{$id}/repository/branches",
            ['branch' => $branch, 'ref' => $ref]
        );
    }

    public function delete($id, string $branch)
    {
        list($id, $branch) = $this->encode([$id, $branch]);

        return $this->requestDelete("projects/{$id}/repository/branches/{$branch}");
    }

    public function deleteMerged($id)
    {
        $id = $this->encode($id);

        return $this->requestDelete("projects/{$id}/repository/merged_branches");
    }

    public function protect(
        $id,
        string $branch,
        array $developersCan = ['push' => false, 'merge' => false]
    ) {
        list($id, $branch) = $this->encode([$id, $branch]);

        return $this->requestPut(
            "projects/{$id}/repository/branches/{$branch}/protect",
            [
                'developers_can_push'  => $developersCan['push'] ?? false,
                'developers_can_merge' => $developersCan['merge'] ?? false,
            ]
        );
    }

    public function unprotect($id, string $branch)
    {
        list($id, $branch) = $this->encode([$id, $branch]);

        return $this->requestDelete("projects/{$id}/protected_branches/{$branch}");
    }
}
