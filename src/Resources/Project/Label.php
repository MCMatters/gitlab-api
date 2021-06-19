<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\LabelTrait;

/**
 * Class Label
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Label extends ProjectResource
{
    use LabelTrait;

    /**
     * @param int|string $id
     * @param string $name
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/labels.md#promote-a-project-label-to-a-group-label
     */
    public function promote($id, string $name): array
    {
        return $this->httpClient
            ->withJson(['name' => $name])
            ->put($this->encodeUrl('projects/:id/labels/promote', $id))
            ->json();
    }
}
