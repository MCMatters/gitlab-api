<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const null, true;

/**
 * Class PipelineSchedule
 *
 * @package McMatters\GitlabApi\Resources
 */
class PipelineSchedule extends AbstractResource
{
    /**
     * @param int|string $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list($id): array
    {
        return $this->requestGet($this->getUrl($id));
    }

    /**
     * @param int|string $id
     * @param int $scheduleId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get($id, int $scheduleId): array
    {
        return $this->requestGet($this->getUrl($id, $scheduleId));
    }

    /**
     * @param int|string $id
     * @param string $description
     * @param string $ref
     * @param string $cron
     * @param string $cronTimezone
     * @param bool $active
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create(
        $id,
        string $description,
        string $ref,
        string $cron,
        string $cronTimezone = 'UTC',
        bool $active = true
    ): array {
        return $this->requestPost(
            $this->getUrl($id),
            [
                'description'   => $description,
                'ref'           => $ref,
                'cron'          => $cron,
                'cron_timezone' => $cronTimezone,
                'active'        => $active,
            ]
        );
    }

    /**
     * @param int|string $id
     * @param int $scheduleId
     * @param array $data
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function update($id, int $scheduleId, array $data = []): array
    {
        return $this->requestPut($this->getUrl($id, $scheduleId), $data);
    }

    /**
     * @param int|string $id
     * @param int $scheduleId
     *
     * @return int
     * @throws RequestException
     */
    public function delete($id, int $scheduleId): int
    {
        return $this->requestDelete($this->getUrl($id, $scheduleId));
    }

    /**
     * @param int|string $id
     * @param int $scheduleId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function takeOwnership($id, int $scheduleId): array
    {
        return $this->requestPost(
            "{$this->getUrl($id, $scheduleId)}/take_ownership"
        );
    }

    /**
     * @param int|string $id
     * @param int $scheduleId
     * @param string $key
     * @param string $value
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function createVariable(
        $id,
        int $scheduleId,
        string $key,
        string $value
    ): array {
        return $this->requestPost(
            "{$this->getUrl($id, $scheduleId)}/variables",
            ['key' => $key, 'value' => $value]
        );
    }

    /**
     * @param int|string $id
     * @param int $scheduleId
     * @param string $key
     * @param string $value
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function updateVariable(
        $id,
        int $scheduleId,
        string $key,
        string $value
    ): array {
        return $this->requestPut(
            "{$this->getUrl($id, $scheduleId)}/variables",
            ['key' => $key, 'value' => $value]
        );
    }

    /**
     * @param int|string $id
     * @param int $scheduleId
     * @param string $key
     *
     * @return int
     * @throws RequestException
     */
    public function deleteVariable($id, int $scheduleId, string $key): int
    {
        return $this->requestDelete(
            "{$this->getUrl($id, $scheduleId)}/variables/{$key}"
        );
    }

    /**
     * @param int|string $id
     * @param int|null $scheduleId
     *
     * @return string
     */
    protected function getUrl($id, int $scheduleId = null): string
    {
        $url = "projects/{$this->encode($id)}/pipeline_schedules";

        return null !== $scheduleId ? "{$url}/{$scheduleId}" : $url;
    }
}
