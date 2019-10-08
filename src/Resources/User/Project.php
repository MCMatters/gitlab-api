<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\User;

use McMatters\GitlabApi\Resources\UserResource;

/**
 * Class Project
 *
 * @package McMatters\GitlabApi\Resources\User
 */
class Project extends UserResource
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
     * @see https://gitlab.com/help/api/projects.md#list-user-projects
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('users/:user_id/projects', $id),
                ['query' => $query]
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
     * @see https://gitlab.com/help/api/projects.md#list-projects-starred-by-a-user
     */
    public function listStarred($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('users/:user_id/starred_projects', $id),
                ['query' => $query]
            )
            ->json();
    }
}
