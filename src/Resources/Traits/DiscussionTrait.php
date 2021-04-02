<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits;

/**
 * Trait DiscussionTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait DiscussionTrait
{
    use HasAllTrait;

    /**
     * @param int|string $id
     * @param int $iid
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/discussions.md#list-project-issue-discussion-items
     * @see https://gitlab.com/help/api/discussions.md#list-project-snippet-discussion-items
     * @see https://gitlab.com/help/api/discussions.md#list-group-epic-discussion-items
     * @see https://gitlab.com/help/api/discussions.md#list-project-merge-request-discussion-items
     * @see https://gitlab.com/help/api/discussions.md#list-project-commit-discussion-items
     */
    public function list($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                ':base_type/:id/:type/:iid/discussions',
                [$this->baseType, $id, $this->type, $iid]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param array $query
     *
     * @return array
     */
    public function all($id, int $iid, array $query = []): array
    {
        return $this->fetchAllResources('list', [$id, $iid, $query]);
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int|string $discussionId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/discussions.md#get-single-issue-discussion-item
     * @see https://gitlab.com/help/api/discussions.md#get-single-snippet-discussion-item
     * @see https://gitlab.com/help/api/discussions.md#get-single-epic-discussion-item
     * @see https://gitlab.com/help/api/discussions.md#get-single-merge-request-discussion-item
     * @see https://gitlab.com/help/api/discussions.md#get-single-commit-discussion-item
     */
    public function get($id, int $iid, $discussionId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                ':base_type/:id/:type/:iid/discussions/:discussion_id',
                [$this->baseType, $id, $this->type, $iid, $discussionId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param string $body
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/discussions.md#create-new-issue-thread
     * @see https://gitlab.com/help/api/discussions.md#create-new-snippet-thread
     * @see https://gitlab.com/help/api/discussions.md#create-new-epic-thread
     * @see https://gitlab.com/help/api/discussions.md#create-new-merge-request-thread
     * @see https://gitlab.com/help/api/discussions.md#create-new-commit-thread
     */
    public function create($id, int $iid, string $body, array $data = []): array
    {
        return $this->httpClient
            ->withJson(['body' => $body] + $data)
            ->post($this->encodeUrl(
                ':base_type/:id/:type/:iid/discussions',
                [$this->baseType, $id, $this->type, $iid]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int|string $discussionId
     * @param string $body
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/discussions.md#add-note-to-existing-issue-thread
     * @see https://gitlab.com/help/api/discussions.md#add-note-to-existing-snippet-thread
     * @see https://gitlab.com/help/api/discussions.md#add-note-to-existing-epic-thread
     * @see https://gitlab.com/help/api/discussions.md#add-note-to-existing-merge-request-thread
     * @see https://gitlab.com/help/api/discussions.md#add-note-to-existing-commit-thread
     */
    public function createNote(
        $id,
        int $iid,
        $discussionId,
        string $body,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson(['body' => $body] + $data)
            ->post($this->encodeUrl(
                ':base_type/:id/:type/:iid/discussions/:discussion_id/notes',
                [$this->baseType, $id, $this->type, $iid, $discussionId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int|string $discussionId
     * @param int $noteId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/discussions.md#modify-existing-issue-thread-note
     * @see https://gitlab.com/help/api/discussions.md#modify-existing-snippet-thread-note
     * @see https://gitlab.com/help/api/discussions.md#modify-existing-epic-thread-note
     * @see https://gitlab.com/help/api/discussions.md#modify-an-existing-merge-request-thread-note
     * @see https://gitlab.com/help/api/discussions.md#modify-an-existing-commit-thread-note
     */
    public function updateNote(
        $id,
        int $iid,
        $discussionId,
        int $noteId,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl(
                ':base_type/:id/:type/:iid/discussions/:discussion_id/notes/:note_id',
                [$this->baseType, $id, $this->type, $iid, $discussionId, $noteId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int|string $discussionId
     * @param int $noteId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/discussions.md#delete-an-issue-thread-note
     * @see https://gitlab.com/help/api/discussions.md#delete-a-snippet-thread-note
     * @see https://gitlab.com/help/api/discussions.md#delete-an-epic-thread-note
     * @see https://gitlab.com/help/api/discussions.md#delete-a-merge-request-thread-note
     * @see https://gitlab.com/help/api/discussions.md#delete-a-commit-thread-note
     */
    public function deleteNote($id, int $iid, $discussionId, int $noteId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                ':base_type/:id/:type/:iid/discussions/:discussion_id/notes/:note_id',
                [$this->baseType, $id, $this->type, $iid, $discussionId, $noteId]
            ))
            ->getStatusCode();
    }
}
