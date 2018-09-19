<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const false, null;

/**
 * Class DeployKey
 *
 * @package McMatters\GitlabApi\Resources
 */
class DeployKey extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function all(array $query = []): array
    {
        return $this->httpClient
            ->get('deploy_keys', ['query' => $query])
            ->json();
    }

    /**
     * @param int|string $id
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/deploy_keys', $id),
                ['query' => $query]
            )
            ->json();
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
     */
    public function get($id, int $keyId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/deploy_keys/{keyId}',
                [$id, $keyId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $title
     * @param string $key
     * @param bool $canPush
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create(
        $id,
        string $title,
        string $key,
        bool $canPush = false
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/deploy_keys', $id),
                [
                    'json' => [
                        'title' => $title,
                        'key' => $key,
                        'can_push' => $canPush,
                    ],
                ]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $keyId
     * @param string|null $title
     * @param bool $canPush
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update(
        $id,
        int $keyId,
        string $title = null,
        bool $canPush = false
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/{id}/deploy_keys/{keyId}',
                    [$id, $keyId]
                ),
                ['json' => ['title' => $title, 'can_push' => $canPush]]
            )
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
     */
    public function delete($id, int $keyId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/{id}/deploy_keys/{keyId}',
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
     */
    public function enable($id, int $keyId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/deploy_keys/{keyId}/enable',
                [$id, $keyId]
            ))
            ->json();
    }
}
