<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;

/**
 * Class Search
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class Search extends GroupResource
{
    /**
     * @param int|string $id
     * @param string $scope
     * @param string $search
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/search.md#group-search-api
     */
    public function search($id, string $scope, string $search): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('groups/:id/search', $id),
                ['query' => ['scope' => $scope, 'search' => $search]]
            )
            ->json();
    }
}
