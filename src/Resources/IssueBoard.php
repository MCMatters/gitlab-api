<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const null;

/**
 * Class IssueBoard
 *
 * @package McMatters\GitlabApi\Resources
 */
class IssueBoard extends AbstractResource
{
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
     * @param int $boardId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function listLists($id, int $boardId): array
    {
        return $this->requestGet($this->getListsUrl($id, $boardId));
    }

    /**
     * @param int|string $id
     * @param int $boardId
     * @param int $listId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function getList($id, int $boardId, int $listId): array
    {
        return $this->requestGet($this->getListsUrl($id, $boardId, $listId));
    }

    /**
     * @param int|string $id
     * @param int $boardId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function createList($id, int $boardId): array
    {
        return $this->requestPost($this->getListsUrl($id, $boardId));
    }

    /**
     * @param int|string $id
     * @param int $boardId
     * @param int $listId
     * @param int $position
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function updateList(
        $id,
        int $boardId,
        int $listId,
        int $position
    ): array {
        return $this->requestPut(
            $this->getListsUrl($id, $boardId, $listId),
            ['position' => $position]
        );
    }

    /**
     * @param int|string $id
     * @param int $boardId
     * @param int $listId
     *
     * @return int
     * @throws RequestException
     */
    public function deleteList($id, int $boardId, int $listId): int
    {
        return $this->requestDelete($this->getListsUrl($id, $boardId, $listId));
    }

    /**
     * @param int|string $id
     *
     * @return string
     */
    protected function getUrl($id): string
    {
        return "projects/{$this->encode($id)}/boards";
    }

    /**
     * @param int|string $id
     * @param int $boardId
     * @param int|null $listId
     *
     * @return string
     */
    protected function getListsUrl($id, int $boardId, int $listId = null): string
    {
        $url = "{$this->getUrl($id)}/{$boardId}";

        return null !== $listId ? "{$url}/{$listId}" : $url;
    }
}
