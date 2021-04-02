<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class GeoNode
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class GeoNode extends StandaloneResource
{
    use HasAllTrait;

    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/geo_nodes.md#retrieve-configuration-about-all-geo-nodes
     */
    public function list(array $query = []): array
    {
        return $this->httpClient->withQuery($query)->get('geo_nodes')->json();
    }

    /**
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): array
    {
        return $this->fetchAllResources('list', [$query]);
    }

    /**
     * @param int $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/geo_nodes.md#retrieve-configuration-about-a-specific-geo-node
     */
    public function get(int $id): array
    {
        return $this->httpClient->get("geo_nodes/{$id}")->json();
    }

    /**
     * @param int $id
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/geo_nodes.md#edit-a-geo-node
     */
    public function update(int $id, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put("geo_nodes/{$id}")
            ->json();
    }

    /**
     * @param int $id
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/geo_nodes.md#delete-a-geo-node
     */
    public function delete(int $id): int
    {
        return $this->httpClient
            ->delete("geo_nodes/{$id}")
            ->getStatusCode();
    }

    /**
     * @param int $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/geo_nodes.md#repair-a-geo-node
     */
    public function repair(int $id): array
    {
        return $this->httpClient
            ->post("geo_nodes/{$id}/repair")
            ->json();
    }

    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/geo_nodes.md#retrieve-status-about-all-geo-nodes
     */
    public function getStatuses(array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('geo_nodes/status')
            ->json();
    }

    /**
     * @param int $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/geo_nodes.md#retrieve-status-about-a-specific-geo-node
     */
    public function getStatus(int $id): array
    {
        return $this->httpClient->get("geo_nodes/{$id}/status")->json();
    }

    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/geo_nodes.md#retrieve-project-sync-or-verification-failures-that-occurred-on-the-current-node
     */
    public function getCurrentFailures(array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('geo_nodes/current/failures')
            ->json();
    }
}
