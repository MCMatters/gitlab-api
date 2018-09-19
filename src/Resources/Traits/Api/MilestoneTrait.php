<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits\Api;

/**
 * Trait MilestoneTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits\Api
 */
trait MilestoneTrait
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @param int|string $id
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('{type}/{id}/milestones', [$this->type, $id]),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $milestoneId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get($id, int $milestoneId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                '{type}/{id}/milestones/{milestoneId}',
                [$this->type, $id, $milestoneId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $title
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create($id, string $title, array $data = []): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('{type}/{id}/milestones', [$this->type, $id]),
                ['json' => ['title' => $title] + $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $milestoneId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update($id, int $milestoneId, array $data): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    '{type}/{id}/milestones/{milestoneId}',
                    [$this->type, $id, $milestoneId]
                ),
                ['json' => $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $milestoneId
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function issues($id, int $milestoneId, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    '{type}/{id}/milestones/{milestoneId}/issues',
                    [$this->type, $id, $milestoneId]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $milestoneId
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function mergeRequests(
        $id,
        int $milestoneId,
        array $query = []
    ): array {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    '{type}/{id}/milestones/{milestoneId}/merge_requests',
                    [$this->type, $id, $milestoneId]
                ),
                ['query' => $query]
            )
            ->json();
    }
}
