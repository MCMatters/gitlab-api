<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const null;
use function array_filter;

/**
 * Trait MilestoneApiTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait MilestoneApiTrait
{
    use ResourceTypeTrait;

    /**
     * @param int|string $id
     * @param array $iids
     * @param string|null $state
     * @param string|null $search
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list(
        $id,
        array $iids = [],
        string $state = null,
        string $search = null
    ): array {
        return $this->requestGet(
            $this->getUrl($id),
            array_filter([
                'iids'   => $iids,
                'state'  => $state,
                'search' => $search,
            ])
        );
    }

    /**
     * @param int|string $id
     * @param int $milestoneId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get($id, int $milestoneId): array
    {
        return $this->requestGet($this->getUrl($id, $milestoneId));
    }

    /**
     * @param int|string $id
     * @param string $title
     * @param string|null $description
     * @param null $dueDate
     * @param null $startDate
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create(
        $id,
        string $title,
        string $description = null,
        $dueDate = null,
        $startDate = null
    ): array {
        return $this->requestPost(
            $this->getUrl($id),
            array_filter([
                'title'       => $title,
                'description' => $description,
                'due_date'    => (string) $dueDate,
                'start_date'  => (string) $startDate,
            ])
        );
    }

    /**
     * @param int|string $id
     * @param int $milestoneId
     * @param array $data
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function update($id, int $milestoneId, array $data = []): array
    {
        return $this->requestPut($this->getUrl($id, $milestoneId), $data);
    }

    /**
     * @param int|string $id
     * @param int $milestoneId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function issues($id, int $milestoneId): array
    {
        return $this->requestGet("{$this->getUrl($id, $milestoneId)}/issues");
    }

    /**
     * @param int|string $id
     * @param int $milestoneId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function mergeRequests($id, int $milestoneId): array
    {
        return $this->requestGet("{$this->getUrl($id, $milestoneId)}/merge_requests");
    }

    /**
     * @param int|string $id
     * @param int|null $milestoneId
     *
     * @return string
     */
    protected function getUrl($id, int $milestoneId = null): string
    {
        $id = $this->encode($id);
        $type = $this->getResourceType('Milestone');

        $url = "{$type}s/{$id}/milestones";

        return null !== $milestoneId ? "{$url}/{$milestoneId}" : $url;
    }
}
