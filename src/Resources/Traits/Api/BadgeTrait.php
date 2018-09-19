<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits\Api;

/**
 * Trait BadgeTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits\Api
 */
trait BadgeTrait
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
            ->get($this->encodeUrl(
                '{type}/{id}/badges', [$this->type, $id]),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $badgeId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get($id, int $badgeId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                '{type}/{id}/badges/{badgeId}',
                [$this->type, $id, $badgeId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $linkUrl
     * @param string $imageUrl
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create($id, string $linkUrl, string $imageUrl): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('{type}/{id}/badges', [$this->type, $id]),
                ['json' => ['link_url' => $linkUrl, 'image_url' => $imageUrl]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $badgeId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update($id, int $badgeId, array $data): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    '{type}/{id}/badges/{badgeId}',
                    [$this->type, $id, $badgeId]
                ),
                ['json' => $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $badgeId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function delete($id, int $badgeId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                '{type}/{id}/badges/{badgeId}',
                [$this->type, $id, $badgeId]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param string $linkUrl
     * @param string $imageUrl
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function preview($id, string $linkUrl, string $imageUrl): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    '{type}/{id}/badges/render',
                    [$this->type, $id]
                ),
                ['query' => ['link_url' => $linkUrl, 'image_url' => $imageUrl]]
            )
            ->json();
    }
}
