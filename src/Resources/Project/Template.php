<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class Template
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Template extends ProjectResource
{
    /**
     * @param int|string $id
     * @param string $type
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/project_templates.md#get-all-templates-of-a-particular-type
     */
    public function listByType($id, string $type, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/templates/:type', [$id, $type]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $type
     * @param string $key
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/project_templates.md#get-one-template-of-a-particular-type
     */
    public function getByType(
        $id,
        string $type,
        string $key,
        array $query = []
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                'projects/:id/templates/:type/:key',
                [$id, $type, $key]
            ))
            ->json();
    }
}
