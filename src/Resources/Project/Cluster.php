<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class Cluster
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Cluster extends ProjectResource
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
     * @see https://gitlab.com/help/api/project_clusters.md#list-project-clusters
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/clusters', $id))
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
     * @param int $clusterId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/project_clusters.md#get-a-single-project-cluster
     */
    public function get($id, int $clusterId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/clusters/:cluster_id',
                [$id, $clusterId]
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
     * @see https://gitlab.com/help/api/project_clusters.md#add-existing-cluster-to-project
     */
    public function create($id, string $name, array $data = []): array
    {
        return $this->httpClient
            ->withJson(['name' => $name] + $data)
            ->post($this->encodeUrl('projects/:id/clusters/user', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $clusterId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/project_clusters.md#edit-project-cluster
     */
    public function update($id, int $clusterId, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl(
                'projects/:id/clusters/:cluster_id',
                [$id, $clusterId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $clusterId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/project_clusters.md#delete-project-cluster
     */
    public function delete($id, int $clusterId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/clusters/:cluster_id',
                [$id, $clusterId]
            ))
            ->getStatusCode();
    }
}
