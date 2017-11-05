<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits;

use McMatters\GitlabApi\Exceptions\{
    InvalidDateException, RequestException, ResponseException
};
use const null;

/**
 * Trait NoteApiTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait NoteApiTrait
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
     * @param int $noteId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get($id, int $iid, int $noteId): array
    {
        return $this->requestGet($this->getUrl($id, $iid, $noteId));
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param string $body
     * @param null $createdAt
     *
     * @return array
     * @throws InvalidDateException
     * @throws RequestException
     * @throws ResponseException
     */
    public function create(
        $id,
        int $iid,
        string $body,
        $createdAt = null
    ): array {
        return $this->requestPost(
            $this->getUrl($id, $iid),
            [
                'body'       => $body,
                'created_at' => $this->transformNullableDate($createdAt),
            ]
        );
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $noteId
     * @param string $body
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function update($id, int $iid, int $noteId, string $body): array
    {
        return $this->requestPut(
            $this->getUrl($id, $iid, $noteId),
            ['body' => $body]
        );
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $noteId
     *
     * @return int
     * @throws RequestException
     */
    public function delete($id, int $iid, int $noteId): int
    {
        return $this->requestDelete($this->getUrl($id, $iid, $noteId));
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int|null $noteId
     *
     * @return string
     */
    protected function getUrl(
        $id,
        int $iid,
        int $noteId = null
    ): string {
        $id = $this->encode($id);
        $type = $this->getResourceType('Note');

        $url = "projects/{$id}/{$type}s/{$iid}/notes";

        return null !== $noteId ? "{$url}/{$noteId}" : $url;
    }
}
