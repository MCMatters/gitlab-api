<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

class ProtectedBranch extends AbstractResource
{
    const ACCESS_NONE = 0;
    const ACCESS_DEVELOPER = 30;
    const ACCESS_MASTER = 40;

    public function list($id)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/protected_branches");
    }

    public function get($id, string $name)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/protected_branches/{$name}");
    }

    public function protect(
        $id,
        string $name,
        array $accessLevels = [
            'push'  => self::ACCESS_MASTER,
            'merge' => self::ACCESS_MASTER,
        ]
    ) {
        $id = $this->encode($id);

        return $this->requestPost(
            "projects/{$id}/protected_branches",
            [
                'name'               => $name,
                'push_access_level'  => $accessLevels['push'] ?? self::ACCESS_MASTER,
                'merge_access_level' => $accessLevels['merge'] ?? self::ACCESS_MASTER,
            ]
        );
    }

    public function unprotect($id, string $name)
    {
        $id = $this->encode($id);

        return $this->requestDelete("projects/{$id}/protected_branches/{$name}");
    }
}
