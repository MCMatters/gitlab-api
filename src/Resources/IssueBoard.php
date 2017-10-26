<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

class IssueBoard extends AbstractResource
{
    public function list($id)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/boards");
    }

    public function listLists($id, int $boardId)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/boards/{$boardId}/lists");
    }

    public function getList($id, int $boardId, int $listId)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/boards/{$boardId}/lists/{$listId}");
    }

    public function createList($id, int $boardId)
    {
        $id = $this->encode($id);

        return $this->requestPost("projects/{$id}/boards/{$boardId}/lists");
    }

    public function updateList($id, int $boardId, int $listId, int $position)
    {
        $id = $this->encode($id);

        return $this->requestPut(
            "projects/{$id}/boards/{$boardId}/lists/{$listId}",
            ['position' => $position]
        );
    }

    public function deleteList($id, int $boardId, int $listId)
    {
        return $this->requestDelete("projects/{$id}/boards/{$boardId}/lists/{$listId}");
    }
}
