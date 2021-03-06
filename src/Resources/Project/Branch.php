<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class Branch
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Branch extends ProjectResource
{
    use HasAllTrait;

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
     * @see https://gitlab.com/help/api/branches.md#list-repository-branches
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/repository/branches', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param array $query
     *
     * @return array
     */
    public function all($id, array $query = []): array
    {
        return $this->fetchAllResources('list', [$id, $query]);
    }

    /**
     * @param int|string $id
     * @param string $branch
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/branches.md#get-single-repository-branch
     */
    public function get($id, string $branch): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/repository/branches/:branch',
                [$id, $branch]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $branch
     * @param string $ref
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/branches.md#create-repository-branch
     */
    public function create($id, string $branch, string $ref): array
    {
        return $this->httpClient
            ->withJson(['branch' => $branch, 'ref' => $ref])
            ->post($this->encodeUrl('projects/:id/repository/branches', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $branch
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/branches.md#delete-repository-branch
     */
    public function delete($id, string $branch): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/repository/branches/:branch',
                [$id, $branch]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/branches.md#delete-merged-branches
     */
    public function deleteMerged($id): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/repository/merged_branches',
                $id
            ))
            ->getStatusCode();
    }
}
