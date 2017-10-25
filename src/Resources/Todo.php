<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

class Todo extends AbstractResource
{
    public function list(array $filters = [])
    {
        return $this->requestGet('todos', $filters);
    }

    public function markAsDone(int $id)
    {
        return $this->requestPost("todos/{$id}/mark_as_done");
    }

    public function markAllAsDone()
    {
        return $this->requestPost('todos/mark_as_done');
    }
}
