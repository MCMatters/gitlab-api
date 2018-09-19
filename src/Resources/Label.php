<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const null;

/**
 * Class Label
 *
 * @package McMatters\GitlabApi\Resources
 */
class Label extends AbstractResource
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
                $this->encodeUrl('projects/{id}/labels', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $name
     * @param string $color
     * @param string|null $description
     * @param int|null $priority
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create(
        $id,
        string $name,
        string $color,
        string $description = null,
        int $priority = null
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/labels', $id),
                [
                    'json' => [
                        'name' => $name,
                        'color' => $color,
                        'description' => $description,
                        'priority' => $priority,
                    ],
                ]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $name
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function delete($id, string $name): int
    {
        return $this->httpClient
            ->delete(
                $this->encodeUrl('projects/{id}/labels', $id),
                ['query' => ['name' => $name]]
            )
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update($id, array $data): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl('projects/{id}/labels', $id),
                ['json' => $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int|string $labelId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function subscribe($id, $labelId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/labels/{labelId}/subscribe',
                [$id, $labelId])
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int|string $labelId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function unsubscribe($id, $labelId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/labels/{labelId}/unsubscribe',
                [$id, $labelId])
            )
            ->json();
    }
}
