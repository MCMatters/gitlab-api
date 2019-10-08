<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

use function implode, is_array;

/**
 * Class Dependency
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Dependency extends ProjectResource
{
    /**
     * @param int|string $id
     * @param array|string $manager
     *
     * @return array
     */
    public function list($id, $manager): array
    {
        if (is_array($manager)) {
            $manager = implode(',', $manager);
        }

        return $this->httpClient
            ->withQuery(['package_manager' => $manager])
            ->get($this->encodeUrl('projects/:id/dependencies', $id))
            ->json();
    }
}
