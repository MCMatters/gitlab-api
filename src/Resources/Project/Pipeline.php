<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class Pipeline
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Pipeline extends ProjectResource
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
     * @see https://gitlab.com/help/api/pipelines.md#list-project-pipelines
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/pipelines', $id))
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
     * @param int $pipelineId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pipelines.md#get-a-single-pipeline
     */
    public function get($id, int $pipelineId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/pipelines/:pipeline_id',
                [$id, $pipelineId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $pipelineId
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pipelines.md#get-variables-of-a-pipeline
     */
    public function variables($id, int $pipelineId, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                'projects/:id/pipelines/:pipeline_id/variables',
                [$id, $pipelineId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $ref
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pipelines.md#create-a-new-pipeline
     */
    public function create($id, string $ref, array $data = []): array
    {
        return $this->httpClient
            ->withJson(['ref' => $ref] + $data)
            ->post($this->encodeUrl('projects/:id/pipeline', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $pipelineId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pipelines.md#retry-jobs-in-a-pipeline
     */
    public function retryJobs($id, int $pipelineId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/pipelines/:pipeline_id/retry',
                [$id, $pipelineId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $pipelineId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pipelines.md#cancel-a-pipelines-jobs
     */
    public function cancelJobs($id, int $pipelineId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/pipelines/:pipeline_id/cancel',
                [$id, $pipelineId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $pipelineId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pipelines.md#delete-a-pipeline
     */
    public function delete($id, int $pipelineId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/pipelines/:pipeline_id',
                [$id, $pipelineId]
            ))
            ->getStatusCode();
    }
}
