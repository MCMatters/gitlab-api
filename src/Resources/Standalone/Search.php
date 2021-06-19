<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class Search
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class Search extends StandaloneResource
{
    /**
     * @param string $scope
     * @param string $search
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/search.md#global-search-api
     */
    public function search(string $scope, string $search): array
    {
        return $this->httpClient
            ->withQuery(['scope' => $scope, 'search' => $search])
            ->get('search')
            ->json();
    }
}
