<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class RepositorySubmodule
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class RepositorySubmodule extends ProjectResource
{
    /**
     * @param int|string $id
     * @param string $submodule
     * @param string $branch
     * @param string $sha
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/repository_submodules.md#update-existing-submodule-reference-in-repository
     */
    public function update(
        $id,
        string $submodule,
        string $branch,
        string $sha,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson(['branch' => $branch, 'commit_sha' => $sha] + $data)
            ->put($this->encodeUrl(
                'projects/:id/repository/submodules/:submodule',
                [$id, $submodule]
            ))
            ->json();
    }
}
