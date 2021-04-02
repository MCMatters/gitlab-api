<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class PipelineTrigger
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class PipelineTrigger extends ProjectResource
{
    use HasAllTrait;

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
     * @see https://gitlab.com/help/api/pipeline_triggers.md#list-project-triggers
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/triggers', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param array $query
     *
     * @return array
     */
    public function all($id, array $query = []): array
    {
        return $this->fetchAllResources('list', [$id, $query]);
    }

    /**
     * @param int|string $id
     * @param int $triggerId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pipeline_triggers.md#get-trigger-details
     */
    public function get($id, int $triggerId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/triggers/:trigger_id',
                [$id, $triggerId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $description
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pipeline_triggers.md#create-a-project-trigger
     */
    public function create($id, string $description): array
    {
        return $this->httpClient
            ->withJson(['description' => $description])
            ->post($this->encodeUrl('projects/:id/triggers', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $triggerId
     * @param string $description
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pipeline_triggers.md#update-a-project-trigger
     */
    public function update($id, int $triggerId, string $description): array
    {
        return $this->httpClient
            ->withJson(['description' => $description])
            ->put($this->encodeUrl(
                'projects/:id/triggers/:trigger_id',
                [$id, $triggerId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $triggerId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/pipeline_triggers.md#remove-a-project-trigger
     */
    public function delete($id, int $triggerId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/triggers/:trigger_id',
                [$id, $triggerId]
            ))
            ->getStatusCode();
    }
}
