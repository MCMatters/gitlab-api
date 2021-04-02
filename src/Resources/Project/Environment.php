<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class Environment
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Environment extends ProjectResource
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
     * @see https://gitlab.com/help/api/environments.md#list-environments
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/environments', $id))
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
     * @param int $environmentId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/environments.md#get-a-specific-environment
     */
    public function get($id, int $environmentId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/environments/:environment_id',
                [$id, $environmentId]
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
     * @see https://gitlab.com/help/api/environments.md#create-a-new-environment
     */
    public function create($id, string $name, array $data = []): array
    {
        return $this->httpClient
            ->withJson(['name' => $name] + $data)
            ->post($this->encodeUrl('projects/:id/environments', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $environmentId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/environments.md#edit-an-existing-environment
     */
    public function update($id, int $environmentId, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl(
                'projects/:id/environments/:environment_id',
                [$id, $environmentId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $environmentId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/environments.md#delete-an-environment
     */
    public function delete($id, int $environmentId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/environments/:environment_id',
                [$id, $environmentId]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int $environmentId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/environments.md#stop-an-environment
     */
    public function stop($id, int $environmentId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/environments/:environment_id/stop',
                [$id, $environmentId]
            ))
            ->json();
    }
}
