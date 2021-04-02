<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits;

/**
 * Trait AwardEmojiTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait AwardEmojiTrait
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
     * @see https://gitlab.com/help/api/award_emoji.md#list-an-awardables-award-emoji
     */
    public function list($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                'projects/:id/:type/:iid/award_emoji',
                [$id, $this->type, $iid]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param array $query
     *
     * @return array
     */
    public function all($id, array $query = []): array
    {
        return $this->fetchAllResources('list', [$id, $query]);
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
     *
     * @see https://gitlab.com/help/api/award_emoji.md#get-single-award-emoji
     */
    public function get($id, int $iid, int $awardId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/:type/:iid/award_emoji/:award_id',
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
     *
     * @see https://gitlab.com/help/api/award_emoji.md#award-a-new-emoji
     */
    public function create($id, int $iid, string $name): array
    {
        return $this->httpClient
            ->withJson(['name' => $name])
            ->post($this->encodeUrl(
                'projects/:id/:type/:iid/award_emoji',
                [$id, $this->type, $iid]
            ))
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
     *
     * @see https://gitlab.com/help/api/award_emoji.md#delete-an-award-emoji
     */
    public function delete($id, int $iid, int $awardId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/:type/:iid/award_emoji/:award_id',
                [$id, $this->type, $iid, $awardId]
            ))
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
     *
     * @see https://gitlab.com/help/api/award_emoji.md#list-a-comments-award-emoji
     */
    public function listFromNote(
        $id,
        int $iid,
        int $noteId,
        array $query = []
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                'projects/:id/:type/:iid/notes/:note_id/award_emoji',
                [$id, $this->type, $iid, $noteId]
            ))
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
     *
     * @see https://gitlab.com/help/api/award_emoji.md#get-an-award-emoji-for-a-comment
     */
    public function getFromNote($id, int $iid, int $noteId, int $awardId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/:type/:iid/notes/:note_id/award_emoji/:award_id',
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
     *
     * @see https://gitlab.com/help/api/award_emoji.md#award-a-new-emoji-on-a-comment
     */
    public function createForNote(
        $id,
        int $iid,
        int $noteId,
        string $name
    ): array {
        return $this->httpClient
            ->withJson(['name' => $name])
            ->post($this->encodeUrl(
                'projects/:id/:type/:iid/notes/:note_id/award_emoji',
                [$id, $this->type, $iid, $noteId]
            ))
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
     *
     * @see https://gitlab.com/help/api/award_emoji.md#delete-an-award-emoji-from-a-comment
     */
    public function deleteFromNote(
        $id,
        int $iid,
        int $noteId,
        int $awardId
    ): int {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/:type/:iid/notes/:note_id/award_emoji/:award_id',
                [$id, $this->type, $iid, $noteId, $awardId]
            ))
            ->getStatusCode();
    }
}
