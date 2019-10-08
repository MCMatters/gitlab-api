<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class Namespaces
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class Namespaces extends StandaloneResource
{
    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/namespaces.md#list-namespaces
     */
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->get('namespaces', ['query' => $query])
            ->json();
    }

    /**
     * @param string $search
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/namespaces.md#search-for-namespace
     */
    public function search(string $search, array $query = []): array
    {
        return $this->list(['search' => $search] + $query);
    }

    /**
     * @param int|string $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/namespaces.md#get-namespace-by-id
     */
    public function get($id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('namespaces/:id', $id))
            ->json();
    }
}
