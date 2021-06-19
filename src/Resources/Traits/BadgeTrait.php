<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Traits;

/**
 * Trait BadgeTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait BadgeTrait
{
    use HasAllTrait;

    /**
     * @param int|string $id
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/project_badges.md#list-all-badges-of-a-project
     * @see https://gitlab.com/help/api/group_badges.md#list-all-badges-of-a-group
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(':type/:id/badges', [$this->type, $id]))
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
     * @param int $badgeId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/project_badges.md#get-a-badge-of-a-project
     * @see https://gitlab.com/help/api/group_badges.md#get-a-badge-of-a-group
     */
    public function get($id, int $badgeId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                ':type/:id/badges/:badge_id',
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
     *
     * @see https://gitlab.com/help/api/project_badges.md#add-a-badge-to-a-project
     * @see https://gitlab.com/help/api/group_badges.md#add-a-badge-to-a-group
     */
    public function create($id, string $linkUrl, string $imageUrl): array
    {
        return $this->httpClient
            ->withJson(['link_url' => $linkUrl, 'image_url' => $imageUrl])
            ->post($this->encodeUrl(':type/:id/badges', [$this->type, $id]))
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
     *
     * @see https://gitlab.com/help/api/project_badges.md#edit-a-badge-of-a-project
     * @see https://gitlab.com/help/api/group_badges.md#edit-a-badge-of-a-group
     */
    public function update($id, int $badgeId, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl(
                ':type/:id/badges/:badge_id',
                [$this->type, $id, $badgeId]
            ))
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
     *
     * @see https://gitlab.com/help/api/project_badges.md#remove-a-badge-from-a-project
     * @see https://gitlab.com/help/api/group_badges.md#remove-a-badge-from-a-group
     */
    public function delete($id, int $badgeId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                ':type/:id/badges/:badge_id',
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
     *
     * @see https://gitlab.com/help/api/project_badges.md#preview-a-badge-from-a-project
     * @see https://gitlab.com/help/api/group_badges.md#preview-a-badge-from-a-group
     */
    public function preview($id, string $linkUrl, string $imageUrl): array
    {
        return $this->httpClient
            ->withQuery(['link_url' => $linkUrl, 'image_url' => $imageUrl])
            ->get($this->encodeUrl(
                ':type/:id/badges/render',
                [$this->type, $id]
            ))
            ->json();
    }
}
