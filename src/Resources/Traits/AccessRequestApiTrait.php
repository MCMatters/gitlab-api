<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use McMatters\GitlabApi\Enumerators\AccessLevel;

/**
 * Trait AccessRequestApiTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait AccessRequestApiTrait
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
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create($id): array
    {
        return $this->requestPost($this->getUrl($id));
    }

    /**
     * @param int|string $id
     * @param int $userId
     * @param int $level
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function approve(
        $id,
        int $userId,
        int $level = AccessLevel::DEVELOPER
    ): array {
        return $this->requestPut(
            "{$this->getUrl($id)}/{$userId}/approve",
            ['access_level' => $level]
        );
    }

    /**
     * @param int|string $id
     * @param int $userId
     *
     * @return int
     * @throws RequestException
     */
    public function deny($id, int $userId): int
    {
        return $this->requestDelete("{$this->getUrl($id)}/{$userId}");
    }

    /**
     * @param int|string $id
     *
     * @return string
     */
    protected function getUrl($id): string
    {
        $id = $this->encode($id);
        $type = $this->getResourceType('AccessRequest');

        return "{$type}s/{$id}/access_requests";
    }
}
