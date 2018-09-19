<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class PipelineTrigger
 *
 * @package McMatters\GitlabApi\Resources
 */
class PipelineTrigger extends AbstractResource
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
                $this->encodeUrl('projects/{id}/triggers', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $triggerId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get($id, int $triggerId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/triggers/{triggerId}',
                [$id, $triggerId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $description
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create($id, string $description): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/triggers', $id),
                ['json' => ['description' => $description]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $triggerId
     * @param string $description
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update($id, int $triggerId, string $description): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/{id}/triggers/{triggerId}',
                    [$id, $triggerId]
                ),
                ['json' => ['description' => $description]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $triggerId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function takeOwnership($id, int $triggerId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/triggers/{triggerId}/take_ownership',
                [$id, $triggerId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $triggerId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function delete($id, int $triggerId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/{id}/triggers/{triggerId}',
                [$id, $triggerId]
            ))
            ->getStatusCode();
    }
}
