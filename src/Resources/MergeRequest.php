<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class MergeRequest
 *
 * @package McMatters\GitlabApi\Resources
 */
class MergeRequest extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->get('merge_requests', ['query' => $query])
            ->json();
    }

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
    public function projectList($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/merge_requests', $id),
                ['query' => $query]
            )
            ->json();
    }

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
    public function groupList($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('groups/{id}/merge_requests', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/merge_requests/{iid}',
                    [$id, $iid]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function participants($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/merge_requests/{iid}/participants',
                    [$id, $iid]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function commits($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/merge_requests/{iid}/commits',
                    [$id, $iid]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function changes($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/merge_requests/{iid}/changes',
                    [$id, $iid]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function pipelines($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/merge_requests/{iid}/pipelines',
                    [$id, $iid]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $source
     * @param string $target
     * @param string $title
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
        string $source,
        string $target,
        string $title,
        array $data = []
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/merge_requests', $id),
                [
                    'json' => [
                        'source_branch' => $source,
                        'target_branch' => $target,
                        'title' => $title,
                    ] + $data,
                ]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update($id, int $iid, array $data): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/{id}/merge_requests/{iid}',
                    [$id, $iid]
                ),
                ['json' => $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function delete($id, int $iid): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/{id}/merge_requests/{iid}',
                [$id, $iid]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function accept($id, int $iid, array $data = []): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/{id}/merge_requests/{iid}/merge',
                    [$id, $iid]
                ),
                ['json' => $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function cancelWhenPipelineSucceeds($id, int $iid): array
    {
        return $this->httpClient
            ->put($this->encodeUrl(
                'projects/{id}/merge_requests/{iid}/cancel_merge_when_pipeline_succeeds',
                [$id, $iid]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function closesIssues(
        $id,
        int $iid,
        array $query = []
    ): array {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/merge_requests/{iid}/closes_issues',
                    [$id, $iid]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function subscribe($id, int $iid): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/merge_requests/{iid}/subscribe',
                [$id, $iid]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function unsubscribe($id, int $iid): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/merge_requests/{iid}/unsubscribe',
                [$id, $iid]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createTodo($id, int $iid): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/merge_requests/{iid}/todo',
                [$id, $iid]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function diffVersions($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/merge_requests/{iid}/versions',
                    [$id, $iid]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $versionId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function diffVersion($id, int $iid, int $versionId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/merge_requests/{iid}/versions/{versionId}',
                [$id, $iid, $versionId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param string $duration
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function setEstimatedTime($id, int $iid, string $duration): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/{id}/merge_requests/{iid}/time_estimate',
                    [$id, $iid]
                ),
                ['json' => ['duration' => $duration]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function resetEstimatedTime($id, int $iid): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/merge_requests/{iid}/reset_time_estimate',
                [$id, $iid]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param string $duration
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createSpentTime($id, int $iid, string $duration): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/{id}/merge_requests/{iid}/add_spent_time',
                    [$id, $iid]
                ),
                ['json' => ['duration' => $duration]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function resetSpentTime($id, int $iid): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/merge_requests/{iid}/reset_spent_time',
                [$id, $iid]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getTimeTrackingStatistic($id, int $iid): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/merge_requests/{iid}/time_stats',
                [$id, $iid]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function close($id, int $iid): array
    {
        return $this->update($id, $iid, ['state_event' => 'close']);
    }

    /**
     * @param int|string $id
     * @param int $iid
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function reopen($id, int $iid): array
    {
        return $this->update($id, $iid, ['state_event' => 'reopen']);
    }
}
