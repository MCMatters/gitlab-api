<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use McMatters\GitlabApi\Resources\Traits\ResourceTypeTrait;
use const null;

/**
 * Trait AwardEmojiApiTrait
 *
 * @package McMatters\GitlabApi\Resources
 */
trait AwardEmojiApiTrait
{
    use ResourceTypeTrait;

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list($id, int $iid): array
    {
        return $this->requestGet($this->getUrl($id, $iid));
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $awardId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get($id, int $iid, int $awardId): array
    {
        return $this->requestGet($this->getUrl($id, $iid, $awardId));
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param string $name
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create($id, int $iid, string $name): array
    {
        return $this->requestPost($this->getUrl($id, $iid), ['name' => $name]);
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return int
     * @throws RequestException
     */
    public function delete($id, int $iid): int
    {
        return $this->requestDelete($this->getUrl($id, $iid));
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $noteId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function listFromNote($id, int $iid, int $noteId): array
    {
        return $this->requestGet($this->getNotesUrl($id, $iid, $noteId));
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $noteId
     * @param int $awardId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function getFromNote($id, int $iid, int $noteId, int $awardId): array
    {
        return $this->requestGet($this->getNotesUrl($id, $iid, $noteId, $awardId));
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $noteId
     * @param string $name
     *
     * @return mixed
     * @throws RequestException
     * @throws ResponseException
     */
    public function createForNote($id, int $iid, int $noteId, string $name)
    {
        return $this->requestPost(
            $this->getNotesUrl($id, $iid, $noteId),
            ['name' => $name]
        );
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $noteId
     * @param int $awardId
     *
     * @return int
     * @throws RequestException
     */
    public function deleteFromNote($id, int $iid, int $noteId, int $awardId): int
    {
        return $this->requestDelete(
            $this->getNotesUrl($id, $iid, $noteId, $awardId)
        );
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int|null $awardId
     *
     * @return string
     */
    protected function getUrl($id, int $iid, int $awardId = null): string
    {
        $url = "{$this->getBaseUrl($id, $iid)}/award_emoji";

        return null !== $awardId ? "{$url}/{$awardId}" : $url;
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $noteId
     * @param int|null $awardId
     *
     * @return string
     */
    protected function getNotesUrl(
        $id,
        int $iid,
        int $noteId,
        int $awardId = null
    ): string {
        $url = "{$this->getBaseUrl($id, $iid)}/notes/{$noteId}/award_emoji";

        return null !== $awardId ? "{$url}/{$awardId}" : $url;
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return string
     */
    protected function getBaseUrl($id, int $iid): string
    {
        $id = $this->encode($id);
        $type = $this->getResourceType('AwardEmoji');

        return "projects/{$id}/{$type}s/{$iid}";
    }
}
