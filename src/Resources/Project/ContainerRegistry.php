<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\ContainerRegistryTrait;

/**
 * Class ContainerRegistry
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class ContainerRegistry extends ProjectResource
{
    use ContainerRegistryTrait;

    /**
     * @param int|string $id
     * @param int $repositoryId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/container_registry.md#delete-registry-repository
     */
    public function delete($id, int $repositoryId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/registry/repositories/:repository_id',
                [$id, $repositoryId]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int $repositoryId
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/container_registry.md#within-a-project-1
     */
    public function tags($id, int $repositoryId, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                'projects/:id/registry/repositories/:repository_id/tags',
                [$id, $repositoryId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $repositoryId
     * @param string $tagName
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/container_registry.md#get-details-of-a-repository-tag
     */
    public function getTag($id, int $repositoryId, string $tagName): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/registry/repositories/:repository_id/tags/:tag_name',
                [$id, $repositoryId, $tagName]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $repositoryId
     * @param string $tagName
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/container_registry.md#delete-a-repository-tag
     */
    public function deleteTag($id, int $repositoryId, string $tagName): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/registry/repositories/:repository_id/tags/:tag_name',
                [$id, $repositoryId, $tagName]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int $repositoryId
     * @param string $nameRegex
     * @param array $data
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/container_registry.md#delete-repository-tags-in-bulk
     */
    public function bulkDeleteTags(
        $id,
        int $repositoryId,
        string $nameRegex,
        array $data = []
    ): int {
        return $this->httpClient
            ->withJson(['name_regex' => $nameRegex] + $data)
            ->delete($this->encodeUrl(
                'projects/:id/registry/repositories/:repository_id/tags',
                [$id, $repositoryId]
            ))
            ->getStatusCode();
    }
}
