<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Traits;

/**
 * Trait NoteTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait NoteTrait
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
     * @see https://gitlab.com/help/api/notes.md#list-project-issue-notes
     * @see https://gitlab.com/help/api/notes.md#list-all-snippet-notes
     * @see https://gitlab.com/help/api/notes.md#list-all-merge-request-notes
     * @see https://gitlab.com/help/api/notes.md#list-all-epic-notes
     */
    public function list($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                ':base_type/:id/:type/:iid/notes',
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
     * @param int $noteId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/notes.md#get-single-issue-note
     * @see https://gitlab.com/help/api/notes.md#get-single-snippet-note
     * @see https://gitlab.com/help/api/notes.md#get-single-merge-request-note
     * @see https://gitlab.com/help/api/notes.md#get-single-epic-note
     */
    public function get($id, int $iid, int $noteId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                ':base_type/:id/:type/:iid/notes/:note_id',
                [$this->baseType, $id, $this->type, $iid, $noteId]
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
     * @see https://gitlab.com/help/api/notes.md#create-new-issue-note
     * @see https://gitlab.com/help/api/notes.md#create-new-snippet-note
     * @see https://gitlab.com/help/api/notes.md#create-new-merge-request-note
     * @see https://gitlab.com/help/api/notes.md#get-single-epic-note
     */
    public function create($id, int $iid, string $body, array $data = []): array
    {
        return $this->httpClient
            ->withJson(['body' => $body] + $data)
            ->post($this->encodeUrl(
                ':base_type/:id/:type/:iid/notes',
                [$this->baseType, $id, $this->type, $iid]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $noteId
     * @param string $body
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/notes.md#modify-existing-issue-note
     * @see https://gitlab.com/help/api/notes.md#modify-existing-snippet-note
     * @see https://gitlab.com/help/api/notes.md#modify-existing-merge-request-note
     * @see https://gitlab.com/help/api/notes.md#modify-existing-epic-note
     */
    public function update($id, int $iid, int $noteId, string $body): array
    {
        return $this->httpClient
            ->withJson(['body' => $body])
            ->put($this->encodeUrl(
                ':base_type/:id/:type/:iid/notes/:note_id',
                [$this->baseType, $id, $this->type, $iid, $noteId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $noteId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/notes.md#delete-an-issue-note
     * @see https://gitlab.com/help/api/notes.md#delete-a-snippet-note
     * @see https://gitlab.com/help/api/notes.md#delete-a-merge-request-note
     * @see https://gitlab.com/help/api/notes.md#delete-an-epic-note
     */
    public function delete($id, int $iid, int $noteId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                ':base_type/:id/:type/:iid/notes/:note_id',
                [$this->baseType, $id, $this->type, $iid, $noteId]
            ))
            ->getStatusCode();
    }
}
