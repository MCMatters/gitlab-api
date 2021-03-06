<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

use McMatters\GitlabApi\Resources\Traits\HasAllTrait;
use function implode, is_array;

/**
 * Class Dependency
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Dependency extends ProjectResource
{
    use HasAllTrait;

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

    /**
     * @param int|string $id
     * @param array|string $manager
     *
     * @return array
     */
    public function all($id, $manager): array
    {
        return $this->fetchAllResources('list', [$id, $manager]);
    }
}
