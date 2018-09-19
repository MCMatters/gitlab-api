<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class Search
 *
 * @package McMatters\GitlabApi\Resources
 */
class Search extends AbstractResource
{
    /**
     * @param string $scope
     * @param string $search
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function search(
        string $scope,
        string $search,
        array $query = []
    ): array {
        return $this->httpClient
            ->get(
                'search',
                ['query' => ['scope' => $scope, 'search' => $search] + $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $scope
     * @param string $search
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function groupSearch(
        $id,
        string $scope,
        string $search,
        array $query = []
    ): array {
        return $this->httpClient
            ->get(
                $this->encodeUrl('groups/{id}/search', $id),
                ['query' => ['scope' => $scope, 'search' => $search] + $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $scope
     * @param string $search
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function projectSearch(
        $id,
        string $scope,
        string $search,
        array $query = []
    ): array {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/search', $id),
                ['query' => ['scope' => $scope, 'search' => $search] + $query]
            )
            ->json();
    }
}
