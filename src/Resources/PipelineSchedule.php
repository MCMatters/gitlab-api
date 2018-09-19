<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class PipelineSchedule
 *
 * @package McMatters\GitlabApi\Resources
 */
class PipelineSchedule extends AbstractResource
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
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/pipeline_schedules', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $scheduleId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get($id, int $scheduleId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/pipeline_schedules/{scheduleId}',
                [$id, $scheduleId]
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
     */
    public function create(
        $id,
        string $description,
        string $ref,
        string $cron,
        array $data = []
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/pipeline_schedules', $id),
                [
                    'json' => [
                        'description' => $description,
                        'ref' => $ref,
                        'cron' => $cron,
                    ] + $data,
                ]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $scheduleId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update($id, int $scheduleId, array $data): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/{id}/pipeline_schedules/{scheduleId}',
                    [$id, $scheduleId]
                ),
                ['json' => $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $scheduleId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function takeOwnership($id, int $scheduleId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/pipeline_schedules/{scheduleId}/take_ownership',
                [$id, $scheduleId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $scheduleId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function delete($id, int $scheduleId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/{id}/pipeline_schedules/{scheduleId}',
                [$id, $scheduleId]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int $scheduleId
     * @param string $key
     * @param string $value
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createVariable(
        $id,
        int $scheduleId,
        string $key,
        string $value
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/{id}/pipeline_schedules/{scheduleId}/variables',
                    [$id, $scheduleId]
                ),
                ['json' => ['key' => $key, 'value' => $value]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $scheduleId
     * @param string $key
     * @param string $value
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function updateVariable(
        $id,
        int $scheduleId,
        string $key,
        string $value
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/{id}/pipeline_schedules/{scheduleId}/variables/{key}',
                    [$id, $scheduleId, $key]
                ),
                ['json' => ['value' => $value]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $scheduleId
     * @param string $key
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function deleteVariable($id, int $scheduleId, string $key): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/{id}/pipeline_schedules/{scheduleId}/variables/{key}',
                [$id, $scheduleId, $key]
            ))
            ->getStatusCode();
    }
}
