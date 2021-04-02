<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits;

use McMatters\GitlabApi\Enumerators\AccessLevel;

/**
 * Trait AccessRequestTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait AccessRequestTrait
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
     * @see https://gitlab.com/help/api/access_requests.md#list-access-requests-for-a-group-or-project
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                ':type/:id/access_requests',
                [$this->type, $id]
            ))
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
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/access_requests.md#request-access-to-a-group-or-project
     */
    public function create($id): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                ':type/:id/access_requests',
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
     *
     * @see https://gitlab.com/help/api/access_requests.md#approve-an-access-request
     */
    public function approve(
        $id,
        int $userId,
        int $accessLevel = AccessLevel::DEVELOPER
    ): array {
        return $this->httpClient
            ->withJson(['access_level' => $accessLevel])
            ->put($this->encodeUrl(
                ':type/:id/access_requests/:user_id/approve',
                [$this->type, $id, $userId]
            ))
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
     *
     * @see https://gitlab.com/help/api/access_requests.md#deny-an-access-request
     */
    public function deny($id, int $userId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                ':type/:id/access_requests/:user_id',
                [$this->type, $id, $userId]
            ))
            ->getStatusCode();
    }
}
