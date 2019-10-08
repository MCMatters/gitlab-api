<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\MilestoneTrait;

/**
 * Class Milestone
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Milestone extends ProjectResource
{
    use MilestoneTrait;

    /**
     * @param int|string $id
     * @param int $milestoneId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/milestones.md#promote-project-milestone-to-a-group-milestone
     */
    public function promote($id, int $milestoneId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/milestones/:milestone_id/promote',
                [$id, $milestoneId]
            ))
            ->json();
    }
}
