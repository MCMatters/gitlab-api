<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const null;
use function array_filter;

/**
 * Trait MemberApiTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait MemberApiTrait
{
    use ResourceTypeTrait;

    /**
     * @param int|string $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list($id): array
    {
        return $this->requestGet($this->getUrl($id));
    }

    /**
     * @param int|string $id
     * @param int $userId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get($id, int $userId): array
    {
        return $this->requestGet($this->getUrl($id, $userId));
    }

    /**
     * @param int|string $id
     * @param int $userId
     * @param int $level
     * @param string|null $expiresAt
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create(
        $id,
        int $userId,
        int $level,
        string $expiresAt = null
    ): array {
        return $this->requestPost(
            $this->getUrl($id),
            array_filter([
                'user_id'    => $userId,
                'level'      => $level,
                'expires_at' => $expiresAt,
            ])
        );
    }

    /**
     * @param int|string $id
     * @param int $userId
     * @param int $level
     * @param string|null $expiresAt
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function update(
        $id,
        int $userId,
        int $level,
        string $expiresAt = null
    ): array {
        return $this->requestPut(
            $this->getUrl($id, $userId),
            array_filter([
                'level'      => $level,
                'expires_at' => $expiresAt,
            ])
        );
    }

    /**
     * @param int|string $id
     * @param int $userId
     *
     * @return int
     * @throws RequestException
     */
    public function delete($id, int $userId): int
    {
        return $this->requestDelete($this->getUrl($id, $userId));
    }

    /**
     * @param int|string $id
     * @param int|null $userId
     *
     * @return string
     */
    protected function getUrl($id, int $userId = null): string
    {
        $id = $this->encode($id);
        $type = $this->getResourceType('Member');

        $url = "{$type}s/{$id}/members";

        return null !== $userId ? "{$url}/$userId" : $url;
    }
}
