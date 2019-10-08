<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class Todo
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class Todo extends StandaloneResource
{
    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/todos.md#get-a-list-of-todos
     */
    public function list(array $query = []): array
    {
        return $this->httpClient->withQuery($query)->get('todos')->json();
    }

    /**
     * @param int $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/todos.md#mark-a-todo-as-done
     */
    public function markAsDone(int $id): array
    {
        return $this->httpClient->post("todos/{$id}/mark_as_done")->json();
    }

    /**
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/todos.md#mark-all-todos-as-done
     */
    public function markAllAsDone(): array
    {
        return $this->httpClient->post('todos/mark_as_done')->json();
    }
}
