<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits\Api;

/**
 * Trait NoteTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits\Api
 */
trait NoteTrait
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
                    'projects/{id}/{type}/{iid}/notes',
                    [$id, $this->type, $iid]
                ),
                ['query' => $query]
            )
            ->json();
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
     */
    public function get($id, int $iid, int $noteId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/{type}/{iid}/notes/{noteId}',
                [$id, $this->type, $iid, $noteId]
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
                    'projects/{id}/{type}/{iid}/notes',
                    [$id, $this->type, $iid]
                ),
                ['json' => ['body' => $body] + $data]
            )
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
     */
    public function update($id, int $iid, int $noteId, string $body): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/{id}/{type}/{iid}/notes/{noteId}',
                    [$id, $this->type, $iid, $noteId]
                ),
                ['json' => ['body' => $body]]
            )
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
     */
    public function delete($id, int $iid, int $noteId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/{id}/{type}/{iid}/notes/{noteId}',
                [$id, $this->type, $iid, $noteId]
            ))
            ->getStatusCode();
    }
}
