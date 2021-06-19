<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class Search
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Search extends ProjectResource
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
     * @see https://gitlab.com/help/api/search.md#project-search-api
     */
    public function search($id, string $scope, string $search): array
    {
        return $this->httpClient
            ->withQuery(['scope' => $scope, 'search' => $search])
            ->get($this->encodeUrl('projects/:id/search', $id))
            ->json();
    }
}
