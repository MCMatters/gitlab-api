<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits\Api;

/**
 * Trait AwardEmojiTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits\Api
 */
trait AwardEmojiTrait
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
                    'projects/{id}/{type}/{iid}/award_emoji',
                    [$id, $this->type, $iid]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $awardId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get($id, int $iid, int $awardId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/{type}/{iid}/award_emoji/{awardId}',
                [$id, $this->type, $iid, $awardId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param string $name
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create($id, int $iid, string $name): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/{id}/{type}/{iid}/award_emoji',
                    [$id, $this->type, $iid]
                ),
                ['query' => ['name' => $name]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $awardId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function delete($id, int $iid, int $awardId): int
    {
        return $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'projects/{id}/{type}/{iid}/award_emoji/{awardId}',
                    [$id, $this->type, $iid, $awardId]
                )
            )
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $noteId
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function listFromNote(
        $id,
        int $iid,
        int $noteId,
        array $query = []
    ): array {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/{type}/{iid}/notes/{noteId}/award_emoji',
                    [$id, $this->type, $iid, $noteId]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $noteId
     * @param int $awardId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getFromNote($id, int $iid, int $noteId, int $awardId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/{type}/{iid}/notes/{noteId}/award_emoji/{awardId}',
                [$id, $this->type, $iid, $noteId, $awardId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $noteId
     * @param string $name
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createForNote(
        $id,
        int $iid,
        int $noteId,
        string $name
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/{id}/{type}/{iid}/notes/{noteId}/award_emoji/{awardId}',
                    [$id, $this->type, $iid, $noteId]
                ),
                ['query' => ['name' => $name]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $noteId
     * @param int $awardId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function deleteFromNote(
        $id,
        int $iid,
        int $noteId,
        int $awardId
    ): int {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/{id}/{type}/{iid}/notes/{noteId}/award_emoji/{awardId}',
                [$id, $this->type, $iid, $noteId, $awardId]
            ))
            ->getStatusCode();
    }
}
