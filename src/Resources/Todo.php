<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;

/**
 * Class Todo
 *
 * @package McMatters\GitlabApi\Resources
 */
class Todo extends AbstractResource
{
    /**
     * @param array $filters
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list(array $filters = []): array
    {
        return $this->requestGet('todos', $filters);
    }

    /**
     * @param int $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function markAsDone(int $id): array
    {
        return $this->requestPost("todos/{$id}/mark_as_done");
    }

    /**
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function markAllAsDone(): array
    {
        return $this->requestPost('todos/mark_as_done');
    }
}
