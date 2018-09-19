<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class Tag
 *
 * @package McMatters\GitlabApi\Resources
 */
class Tag extends AbstractResource
{
    /**
     * @param int|string $id
     *
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
                $this->encodeUrl('projects/{id}/repository/tags', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $name
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get($id, string $name): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/repository/tags/{name}',
                [$id, $name]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $name
     * @param string $ref
     * @param array $data
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
        string $ref,
        array $data = []
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/repository/tags', $id),
                ['json' => ['tag_name' => $name, 'ref' => $ref] + $data]
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
            ->delete($this->encodeUrl(
                'projects/{id}/repository/tags/{name}',
                [$id, $name]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param string $name
     * @param string $description
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createRelease($id, string $name, string $description): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/{id}/repository/tags/{name}/release',
                    [$id, $name]
                ),
                ['description' => $description]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $name
     * @param string $description
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function updateRelease($id, string $name, string $description): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/{id}/repository/tags/{name}/release',
                    [$id, $name]
                ),
                ['description' => $description]
            )
            ->json();
    }
}
