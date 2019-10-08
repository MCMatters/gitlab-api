<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Resource;

/**
 * Class Runner
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Runner extends ProjectResource
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
     * @see https://gitlab.com/help/api/runners.md#list-projects-runners
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/:id/runners', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $runnerId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/runners.md#enable-a-runner-in-project
     */
    public function enable($id, int $runnerId): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/:id/runners', $id),
                ['json' => ['runner_id' => $runnerId]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $runnerId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/runners.md#disable-a-runner-from-project
     */
    public function disable($id, int $runnerId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/runners/:runner_id',
                [$id, $runnerId]
            ))
            ->getStatusCode();
    }
}
