<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class Namespaces
 *
 * @package McMatters\GitlabApi\Resources
 */
class Namespaces extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
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
     */
    public function get($id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('namespaces/{id}', $id))
            ->json();
    }
}
