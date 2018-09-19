<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class Repository
 *
 * @package McMatters\GitlabApi\Resources
 */
class Repository extends AbstractResource
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
    public function listTree($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/repository/tree', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $sha
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function blob($id, string $sha): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/repository/blobs/{sha}',
                [$id, $sha]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $sha
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function rawBlob($id, string $sha): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/repository/blobs/{sha}/raw',
                [$id, $sha]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getArchive($id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('projects/{id}/repository/archive', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $from
     * @param string $to
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function compare(
        $id,
        string $from,
        string $to,
        array $query = []
    ): array {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/repository/compare', $id),
                ['query' => ['from' => $from, 'to' => $to] + $query]
            )
            ->json();
    }

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
    public function contributors($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/repository/contributors', $id),
                ['query' => $query]
            )
            ->json();
    }
}
