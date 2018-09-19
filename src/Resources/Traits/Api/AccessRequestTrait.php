<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits\Api;

use McMatters\GitlabApi\Enumerators\AccessLevel;

/**
 * Trait AccessRequestTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits\Api
 */
trait AccessRequestTrait
{
    /**
     * @var string
     */
    protected $type;

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
                $this->encodeUrl(
                    '{type}/{id}/access_requests',
                    [$this->type, $id]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create($id): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                '{type}/{id}/access_requests',
                [$this->type, $id]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $userId
     * @param int $accessLevel
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function approve(
        $id,
        int $userId,
        int $accessLevel = AccessLevel::DEVELOPER
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    '{type}/{id}/access_requests/{userId}/approve',
                    [$this->type, $id, $userId]
                ),
                ['query' => ['access_level' => $accessLevel]]
            )
            ->json();
    }

    /**
     * @param $id
     * @param int $userId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function deny($id, int $userId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                '{type}/{id}/access_requests/{userId}',
                [$this->type, $id, $userId]
            ))
            ->getStatusCode();
    }
}
