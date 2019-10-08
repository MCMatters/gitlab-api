<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits;

/**
 * Trait IssueBoardTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait IssueBoardTrait
{
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
     * @see https://gitlab.com/help/api/boards.md#project-board
     * @see https://gitlab.com/help/api/group_boards.md#list-all-group-issue-boards-in-a-group
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(':type/:id/boards', [$this->type, $id]),
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
     *
     * @see https://gitlab.com/help/api/boards.md#single-board
     * @see https://gitlab.com/help/api/group_boards.md#single-group-issue-board
     */
    public function get($id, int $boardId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                ':type/:id/boards/:board_id',
                [$this->type, $id, $boardId]
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
     * @see https://gitlab.com/help/api/boards.md#create-a-board-starter
     * @see https://gitlab.com/help/api/group_boards.md#create-a-group-issue-board-premium
     */
    public function create($id, string $name, array $data = []): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(':type/:id/boards', [$this->type, $id]),
                ['json' => ['name' => $name] + $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $boardId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/boards.md#update-a-board-starter
     * @see https://gitlab.com/help/api/group_boards.md#update-a-group-issue-board-premium
     */
    public function update($id, int $boardId, array $data): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    ':type/:id/boards/:board_id',
                    [$this->type, $id, $boardId]
                ),
                ['json' => $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $boardId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/boards.md#delete-a-board-starter
     * @see https://gitlab.com/help/api/group_boards.md#delete-a-group-issue-board-premium
     */
    public function delete($id, int $boardId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                ':type/:id/boards/:board_id',
                [$this->type, $id, $boardId]
            ))
            ->getStatusCode();
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
     *
     * @see https://gitlab.com/help/api/boards.md#list-board-lists
     * @see https://gitlab.com/help/api/group_boards.md#list-group-issue-board-lists
     */
    public function listLists($id, int $boardId, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    ':type/:id/boards/:board_id/lists',
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
     *
     * @see https://gitlab.com/help/api/boards.md#single-board-list
     * @see https://gitlab.com/help/api/group_boards.md#single-group-issue-board-list
     */
    public function getList($id, int $boardId, int $listId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                ':type/:id/boards/:board_id/lists/:list_id',
                [$this->type, $id, $boardId, $listId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $boardId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/boards.md#new-board-list
     * @see https://gitlab.com/help/api/group_boards.md#new-group-issue-board-list
     */
    public function createList($id, int $boardId, array $data = []): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    ':type/:id/boards/:board_id/lists',
                    [$this->type, $id, $boardId]
                ),
                ['json' => $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $boardId
     * @param int $listId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/boards.md#edit-board-list
     * @see https://gitlab.com/help/api/group_boards.md#edit-group-issue-board-list
     */
    public function updateList(
        $id,
        int $boardId,
        int $listId,
        array $data = []
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    ':type/:id/boards/:board_id/lists/:list_id',
                    [$this->type, $id, $boardId, $listId]
                ),
                ['json' => $data]
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
     *
     * @see https://gitlab.com/help/api/boards.md#delete-a-board-list
     * @see https://gitlab.com/help/api/group_boards.md#delete-a-group-issue-board-list
     */
    public function deleteList($id, int $boardId, int $listId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                ':type/:id/boards/:board_id/lists/:list_id',
                [$this->type, $id, $boardId, $listId]
            ))
            ->getStatusCode();
    }
}
