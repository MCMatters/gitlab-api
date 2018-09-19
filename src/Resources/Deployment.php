<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class Deployment
 *
 * @package McMatters\GitlabApi\Resources
 */
class Deployment extends AbstractResource
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
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/deployments', $id),
                ['query' => $query]
            )
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
     */
    public function get($id, int $deploymentId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/deployments/{deploymentId}',
                [$id, $deploymentId]
            ))
            ->json();
    }
}
