<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class Service
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Service extends ProjectResource
{
    /**
     * @param int|string $id
     * @param string $service
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function set($id, string $service, array $data = []): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl('projects/:id/services/:service', [$id, $service]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $service
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function delete($id, string $service): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/services/:service',
                [$id, $service]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param string $service
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get($id, string $service): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/services/:service',
                [$id, $service]
            ))
            ->json();
    }
}
