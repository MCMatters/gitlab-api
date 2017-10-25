<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use InvalidArgumentException;
use const true;
use function in_array;

class AwardEmoji extends AbstractResource
{
    public function list($id, int $iid, string $type)
    {
        return $this->requestGet($this->buildBaseUrl($id, $iid, $type));
    }

    public function get($id, int $iid, string $type, int $awardId)
    {
        return $this->requestGet("{$this->buildBaseUrl($id, $iid, $type)}/{$awardId}");
    }

    public function create($id, int $iid, string $type, string $name)
    {
        return $this->requestPost(
            $this->buildBaseUrl($id, $iid, $type),
            ['name' => $name]
        );
    }

    public function delete($id, int $iid, string $type)
    {
        return $this->requestDelete($this->buildBaseUrl($id, $iid, $type));
    }

    public function listFromNote($id, int $iid, string $type, int $noteId)
    {
        return $this->requestGet(
            $this->buildNotesUrl($id, $iid, $type, $noteId)
        );
    }

    public function getFromNote($id, int $iid, string $type, int $noteId, int $awardId)
    {
        return $this->requestGet(
            "{$this->buildNotesUrl($id, $iid, $type, $noteId)}/{$awardId}"
        );
    }

    public function createOnNote($id, int $iid, string $type, int $noteId, string $name)
    {
        return $this->requestPost(
            $this->buildNotesUrl($id, $iid, $type, $noteId),
            ['name' => $name]
        );
    }

    public function deleteFromNote($id, int $iid, string $type, int $noteId, int $awardId)
    {
        return $this->requestDelete(
            "{$this->buildNotesUrl($id, $iid, $type, $noteId)}/{$awardId}"
        );
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param string $type
     *
     * @return string
     * @throws InvalidArgumentException
     */
    protected function buildBaseUrl($id, int $iid, string $type): string
    {
        return "{$this->buildUrl($id, $iid, $type)}/award_emoji";
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param string $type
     * @param int $noteId
     *
     * @return string
     * @throws InvalidArgumentException
     */
    protected function buildNotesUrl($id, int $iid, string $type, int $noteId): string
    {
        return "{$this->buildUrl($id, $iid, $type)}/notes/{$noteId}/award_emoji";
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param string $type
     *
     * @return string
     * @throws InvalidArgumentException
     */
    protected function buildUrl($id, int $iid, string $type): string
    {
        $types = ['issue', 'merge_request', 'snippet'];

        if (!in_array($type, $types, true)) {
            throw new InvalidArgumentException('$type is invalid.');
        }

        $id = $this->encode($id);

        return "projects/{$id}/{$type}s/{$iid}";
    }
}
