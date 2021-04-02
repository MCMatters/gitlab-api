<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class PipelineSchedule
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class PipelineSchedule extends ProjectResource
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
     * @see https://gitlab.com/help/api/pipeline_schedules.md#get-all-pipeline-schedules
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/pipeline_schedules', $id))
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
     * @param int $pipelineScheduleId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pipeline_schedules.md#get-a-single-pipeline-schedule
     */
    public function get($id, int $pipelineScheduleId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/pipeline_schedules/:pipeline_schedule_id',
                [$id, $pipelineScheduleId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $description
     * @param string $ref
     * @param string $cron
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pipeline_schedules.md#create-a-new-pipeline-schedule
     */
    public function create(
        $id,
        string $description,
        string $ref,
        string $cron,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson([
                    'description' => $description,
                    'ref' => $ref,
                    'cron' => $cron,
                ] + $data
            )
            ->post($this->encodeUrl('projects/:id/pipeline_schedules', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $pipelineScheduleId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pipeline_schedules.md#edit-a-pipeline-schedule
     */
    public function update($id, int $pipelineScheduleId, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl(
                'projects/:id/pipeline_schedules/:pipeline_schedule_id',
                [$id, $pipelineScheduleId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $pipelineScheduleId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pipeline_schedules.md#take-ownership-of-a-pipeline-schedule
     */
    public function takeOwnership($id, int $pipelineScheduleId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/pipeline_schedules/:pipeline_schedule_id/take_ownership',
                [$id, $pipelineScheduleId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $pipelineScheduleId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/pipeline_schedules.md#delete-a-pipeline-schedule
     */
    public function delete($id, int $pipelineScheduleId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/pipeline_schedules/:pipeline_schedule_id',
                [$id, $pipelineScheduleId]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int $pipelineScheduleId
     * @param string $key
     * @param string $value
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pipeline_schedules.md#create-a-new-pipeline-schedule-variable
     */
    public function createVariable(
        $id,
        int $pipelineScheduleId,
        string $key,
        string $value,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson(['key' => $key, 'value' => $value] + $data)
            ->post($this->encodeUrl(
                'projects/:id/pipeline_schedules/:pipeline_schedule_id/variables',
                [$id, $pipelineScheduleId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $pipelineScheduleId
     * @param string $key
     * @param string $value
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pipeline_schedules.md#edit-a-pipeline-schedule-variable
     */
    public function updateVariable(
        $id,
        int $pipelineScheduleId,
        string $key,
        string $value,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson(['value' => $value] + $data)
            ->put($this->encodeUrl(
                'projects/:id/pipeline_schedules/:pipeline_schedule_id/variables/:key',
                [$id, $pipelineScheduleId, $key]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $pipelineScheduleId
     * @param string $key
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/pipeline_schedules.md#delete-a-pipeline-schedule-variable
     */
    public function deleteVariable(
        $id,
        int $pipelineScheduleId,
        string $key
    ): int {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/pipeline_schedules/:pipeline_schedule_id/variables/:key',
                [$id, $pipelineScheduleId, $key]
            ))
            ->getStatusCode();
    }
}
