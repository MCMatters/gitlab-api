<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class ProtectedBranch
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class ProtectedBranch extends ProjectResource
{
    /**
     * @param int|string $id
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/protected_branches.md#list-protected-branches
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/:id/protected_branches', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $name
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/protected_branches.md#get-a-single-protected-branch-or-wildcard-protected-branch
     */
    public function get($id, string $name): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/protected_branches/:name',
                [$id, $name]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $name
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/protected_branches.md#protect-repository-branches
     */
    public function protect($id, string $name, array $data = []): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/:id/protected_branches', $id),
                ['json' => ['name' => $name] + $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $name
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/protected_branches.md#unprotect-repository-branches
     */
    public function unprotect($id, string $name): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/protected_branches/:name',
                [$id, $name]
            ))
            ->getStatusCode();
    }
}
