<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits\Api;

/**
 * Trait DiscussionTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits\Api
 */
trait DiscussionTrait
{
    /**
     * @var string
     */
    protected $type;

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
     */
    public function list($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/{type}/{iid}/discussions',
                    [$id, $this->type, $iid]
                ),
                ['query' => $query]
            )
            ->json();
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
     */
    public function get($id, int $iid, $discussionId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/{type}/{iid}/discussions/{discussionId}',
                [$id, $this->type, $iid, $discussionId]
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
     */
    public function create($id, int $iid, string $body, array $data = []): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/{id}/{type}/{iid}/discussions',
                    [$id, $this->type, $iid]
                ),
                ['json' => ['body' => $body] + $data]
            )
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
     */
    public function createNote(
        $id,
        int $iid,
        $discussionId,
        string $body,
        array $data = []
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/{id}/{type}/{iid}/discussions/{discussionId}/notes',
                    [$id, $this->type, $iid, $discussionId]
                ),
                ['json' => ['body' => $body] + $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int|string $discussionId
     * @param int $noteId
     * @param string $body
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function updateNote(
        $id,
        int $iid,
        $discussionId,
        int $noteId,
        string $body,
        array $data = []
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/{id}/{type}/{iid}/discussions/{discussionId}/notes/{noteId}',
                    [$id, $this->type, $iid, $discussionId, $noteId]
                ),
                ['json' => ['body' => $body] + $data]
            )
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
     */
    public function deleteNote($id, int $iid, $discussionId, int $noteId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/{id}/{type}/{iid}/discussions/{discussionId}/notes/{noteId}',
                [$id, $this->type, $iid, $discussionId, $noteId]
            ))
            ->getStatusCode();
    }
}
