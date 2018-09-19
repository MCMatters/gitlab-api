<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits\Api;

/**
 * Trait MemberTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits\Api
 */
trait MemberTrait
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
                $this->encodeUrl('{type}/{id}/members', [$this->type, $id]),
                ['query' => $query]
            )
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
    public function all($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('{type}/{id}/members/all', [$this->type, $id]),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $userId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get($id, int $userId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                '{type}/{id}/members/{userId}',
                [$this->type, $id, $userId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $userId
     * @param int $accessLevel
     * @param string|null $expiresAt
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create(
        $id,
        int $userId,
        int $accessLevel,
        string $expiresAt = null
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl('{type}/{id}/members', [$this->type, $id]),
                [
                    'json' => [
                        'user_id' => $userId,
                        'access_level' => $accessLevel,
                        'expires_at' => $expiresAt,
                    ],
                ]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $userId
     * @param int $accessLevel
     * @param string|null $expiresAt
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update(
        $id,
        int $userId,
        int $accessLevel,
        string $expiresAt = null
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    '{type}/{id}/members/{userId}',
                    [$this->type, $id, $userId]
                ),
                [
                    'query' => [
                        'access_level' => $accessLevel,
                        'expires_at' => $expiresAt,
                    ],
                ]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $userId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function delete($id, int $userId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                '{type}/{id}/members/{userId}',
                [$this->type, $id, $userId]
            ))
            ->getStatusCode();
    }
}
