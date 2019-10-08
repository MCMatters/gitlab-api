<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class Deployment
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Deployment extends ProjectResource
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
     * @see https://gitlab.com/help/api/deployments.md#list-project-deployments
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/deployments', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $deploymentId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/deployments.md#get-a-specific-deployment
     */
    public function get($id, int $deploymentId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/deployments/:deployment_id',
                [$id, $deploymentId]
            ))
            ->json();
    }
}
