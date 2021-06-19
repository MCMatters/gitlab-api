<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class DeployKey
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class DeployKey extends ProjectResource
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
     * @see https://gitlab.com/help/api/deploy_keys.md#list-project-deploy-keys
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/deploy_keys', $id))
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
     * @param int $keyId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/deploy_keys.md#single-deploy-key
     */
    public function get($id, int $keyId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/deploy_keys/:key_id',
                [$id, $keyId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $title
     * @param string $key
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/deploy_keys.md#add-deploy-key
     */
    public function create(
        $id,
        string $title,
        string $key,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson(['title' => $title, 'key' => $key] + $data)
            ->post($this->encodeUrl('projects/:id/deploy_keys', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $keyId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/deploy_keys.md#update-deploy-key
     */
    public function update($id, int $keyId, array $data = []): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl(
                'projects/:id/deploy_keys/:key_id',
                [$id, $keyId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $keyId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/deploy_keys.md#delete-deploy-key
     */
    public function delete($id, int $keyId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/deploy_keys/:key_id',
                [$id, $keyId]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int $keyId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/deploy_keys.md#enable-a-deploy-key
     */
    public function enable($id, int $keyId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/deploy_keys/:key_id/enable',
                [$id, $keyId]
            ))
            ->json();
    }
}
