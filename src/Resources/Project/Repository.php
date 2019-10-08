<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class Repository
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Repository extends ProjectResource
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
     *
     * @see https://gitlab.com/help/api/repositories.md#list-repository-tree
     */
    public function listTree($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/:id/repository/tree', $id),
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
     *
     * @see https://gitlab.com/help/api/repositories.md#get-a-blob-from-repository
     */
    public function getBlob($id, string $sha): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/repository/blobs/:sha',
                [$id, $sha]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $sha
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/repositories.md#raw-blob-content
     */
    public function getRawBlob($id, string $sha): string
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/repository/blobs/:sha/raw',
                [$id, $sha]
            ))
            ->getBody();
    }

    /**
     * @param int|string $id
     * @param array $query
     * @param string $format
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/repositories.md#get-file-archive
     */
    public function getArchive(
        $id,
        array $query = [],
        string $format = ''
    ): array {
        $suffix = '' !== $format ? ".{$format}" : '';

        return $this->httpClient
            ->get(
                $this->encodeUrl("projects/:id/repository/archive{$suffix}", $id),
                ['query' => $query]
            )
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
     *
     * @see https://gitlab.com/help/api/repositories.md#compare-branches-tags-or-commits
     */
    public function compare(
        $id,
        string $from,
        string $to,
        array $query = []
    ): array {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/:id/repository/compare', $id),
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
     *
     * @see https://gitlab.com/help/api/repositories.md#contributors
     */
    public function contributors($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/:id/repository/contributors', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param array $refs
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/repositories.md#merge-base
     */
    public function getMergeBase($id, array $refs): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/:id/repository/merge_base', $id),
                ['query' => ['refs' => $refs]]
            )
            ->json();
    }
}
