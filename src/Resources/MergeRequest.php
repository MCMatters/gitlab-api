<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const null;
use function array_merge;

/**
 * Class MergeRequest
 *
 * @package McMatters\GitlabApi\Resources
 */
class MergeRequest extends AbstractResource
{
    /**
     * @param array $filters
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list(array $filters = []): array
    {
        return $this->requestGet('merge_requests', $filters);
    }

    /**
     * @param int|string $id
     * @param array $filters
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function projectList($id, array $filters = []): array
    {
        return $this->requestGet($this->getUrl($id), $filters);
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get($id, int $iid): array
    {
        return $this->requestGet($this->getUrl($id, $iid));
    }

    /**
     * @param int|string $id
     * @param string $source
     * @param string $target
     * @param string $title
     * @param array $data
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create(
        $id,
        string $source,
        string $target,
        string $title,
        array $data = []
    ): array {
        $data = array_merge(
            $data,
            [
                'source_branch' => $source,
                'target_branch' => $target,
                'title'         => $title,
            ]
        );

        return $this->requestPost($this->getUrl($id), $data);
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param array $data
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function update($id, int $iid, array $data = []): array
    {
        return $this->requestPut($this->getUrl($id, $iid), $data);
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function close($id, int $iid): array
    {
        return $this->requestPut(
            $this->getUrl($id, $iid),
            ['state_event' => 'close']
        );
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function reopen($id, int $iid): array
    {
        return $this->requestPut(
            $this->getUrl($id, $iid),
            ['state_event' => 'reopen']
        );
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return int
     * @throws RequestException
     */
    public function delete($id, int $iid): int
    {
        return $this->requestDelete($this->getUrl($id, $iid));
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function commits($id, int $iid): array
    {
        return $this->requestGet("{$this->getUrl($id, $iid)}/commits");
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function changes($id, int $iid): array
    {
        return $this->requestGet("{$this->getUrl($id, $iid)}/changes");
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function accept($id, int $iid): array
    {
        // todo: handle errors. create exception classes
        return $this->requestPut("{$this->getUrl($id, $iid)}/merge");
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function cancelWhenPipelineSucceeds($id, int $iid): array
    {
        // todo: handle errors. create exception classes
        return $this->requestPut(
            "{$this->getUrl($id, $iid)}/cancel_merge_when_pipeline_succeeds"
        );
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function listIssuesWillBeClosed($id, int $iid): array
    {
        return $this->requestGet("{$this->getUrl($id, $iid)}/closes_issues");
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function subscribe($id, int $iid): array
    {
        return $this->requestPost("{$this->getUrl($id, $iid)}/subscribe");
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function unsubscribe($id, int $iid): array
    {
        return $this->requestPost("{$this->getUrl($id, $iid)}/unsubscribe");
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function createTodo($id, int $iid): array
    {
        return $this->requestPost("{$this->getUrl($id, $iid)}/todo");
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function diffVersions($id, int $iid): array
    {
        return $this->requestGet("{$this->getUrl($id, $iid)}/versions");
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $versionId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function diffVersion($id, int $iid, int $versionId): array
    {
        return $this->requestGet(
            "{$this->getUrl($id, $iid)}/versions/{$versionId}"
        );
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param string $duration
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function setEstimatedTime($id, int $iid, string $duration): array
    {
        return $this->requestPost(
            "{$this->getUrl($id, $iid)}/time_estimate",
            ['duration' => $duration]
        );
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function resetEstimatedTime($id, int $iid): array
    {
        return $this->requestPost(
            "{$this->getUrl($id, $iid)}/reset_time_estimate"
        );
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param string $duration
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function createSpentTime($id, int $iid, string $duration): array
    {
        return $this->requestPost(
            "{$this->getUrl($id, $iid)}/add_spent_time",
            ['duration' => $duration]
        );
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function resetSpentTime($id, int $iid): array
    {
        return $this->requestPost("{$this->getUrl($id, $iid)}/reset_spent_time");
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function getTimeTrackingStatistics($id, int $iid): array
    {
        return $this->requestGet("{$this->getUrl($id, $iid)}/time_stats");
    }

    /**
     * @param int|string $id
     * @param int|null $iid
     *
     * @return string
     */
    protected function getUrl($id, int $iid = null): string
    {
        $url = "projects/{$this->encode($id)}/merge_requests";

        return null !== $iid ? "{$url}/{$iid}" : $url;
    }
}
