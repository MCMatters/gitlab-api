<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits\Api;

/**
 * Trait IssueBoardTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits\Api
 */
trait IssueBoardTrait
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
                $this->encodeUrl('{type}/{id}/boards', [$this->type, $id]),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $boardId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get($id, int $boardId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                '{type}/{id}/boards/{boardId}',
                [$this->type, $id, $boardId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $boardId
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function listLists($id, int $boardId, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    '{type}/{id}/boards/{boardId}/lists',
                    [$this->type, $id, $boardId]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $boardId
     * @param int $listId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getList($id, int $boardId, int $listId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                '{type}/{id}/boards/{boardId}/lists/{listId}',
                [$this->type, $id, $boardId, $listId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $boardId
     * @param int $labelId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createList($id, int $boardId, int $labelId): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    '{type}/{id}/boards/{boardId}/lists',
                    [$this->type, $id, $boardId]
                ),
                ['query' => ['label_id' => $labelId]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $boardId
     * @param int $listId
     * @param int $position
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function updateList(
        $id,
        int $boardId,
        int $listId,
        int $position
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    '{type}/{id}/boards/{boardId}/lists/{listId}',
                    [$this->type, $id, $boardId, $listId]
                ),
                ['query' => ['position' => $position]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $boardId
     * @param int $listId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function deleteList($id, int $boardId, int $listId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                '{type}/{id}/boards/{boardId}/lists/{listId}',
                [$this->type, $id, $boardId, $listId]
            ))
            ->getStatusCode();
    }
}
