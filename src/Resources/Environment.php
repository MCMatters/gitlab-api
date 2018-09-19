<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const null;

/**
 * Class Environment
 *
 * @package McMatters\GitlabApi\Resources
 */
class Environment extends AbstractResource
{
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
                $this->encodeUrl('projects/{id}/environments', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $name
     * @param string|null $externalUrl
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create($id, string $name, string $externalUrl = null): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/environments', $id),
                ['json' => ['name' => $name, 'external_url' => $externalUrl]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $environmentId
     * @param string|null $name
     * @param string|null $externalUrl
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update(
        $id,
        int $environmentId,
        string $name = null,
        string $externalUrl = null
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/{id}/environments/{environmentsId}',
                    [$id, $environmentId]
                ),
                ['json' => ['name' => $name, 'external_url' => $externalUrl]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $environmentId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function delete($id, int $environmentId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/{id}/environments/{environmentId}',
                [$id, $environmentId]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int $environmentId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function stop($id, int $environmentId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/environments/{environmentId}/stop',
                [$id, $environmentId]
            ))
            ->json();
    }
}
