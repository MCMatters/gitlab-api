<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class MergeRequest
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class MergeRequest extends ProjectResource
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#list-project-merge-requests
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/:id/merge_requests', $id),
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#get-single-mr
     */
    public function get($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/:id/merge_requests/:merge_request_iid',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#get-single-mr-participants
     */
    public function participants($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/:id/merge_requests/:merge_request_iid/participants',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#get-single-mr-commits
     */
    public function commits($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/:id/merge_requests/:merge_request_iid/commits',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#get-single-mr-changes
     */
    public function changes($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/:id/merge_requests/:merge_request_iid/changes',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#list-mr-pipelines
     */
    public function pipelines($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/:id/merge_requests/:merge_request_iid/pipelines',
                    [$id, $iid]
                ),
                ['query' => $query]
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#create-mr-pipeline
     */
    public function createPipeline($id, int $iid, array $data = []): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/:id/merge_requests/:merge_request_iid/pipelines',
                    [$id, $iid]
                ),
                ['json' => $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $sourceBranch
     * @param string $targetBranch
     * @param string $title
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/merge_requests.md#create-mr
     */
    public function create(
        $id,
        string $sourceBranch,
        string $targetBranch,
        string $title,
        array $data = []
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/:id/merge_requests', $id),
                [
                    'json' => [
                        'source_branch' => $sourceBranch,
                        'target_branch' => $targetBranch,
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#update-mr
     */
    public function update($id, int $iid, array $data): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/:id/merge_requests/:merge_request_iid',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#delete-a-merge-request
     */
    public function delete($id, int $iid): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/merge_requests/:merge_request_iid',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#accept-mr
     */
    public function accept($id, int $iid, array $data = []): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/:id/merge_requests/:merge_request_iid/merge',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#merge-to-default-merge-ref-path
     */
    public function mergeToDefaultRef($id, int $iid): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/merge_requests/:merge_request_iid/merge_ref',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#cancel-merge-when-pipeline-succeeds
     */
    public function cancelWhenPipelineSucceeds($id, int $iid): array
    {
        return $this->httpClient
            ->put($this->encodeUrl(
                'projects/:id/merge_requests/:merge_request_iid/cancel_merge_when_pipeline_succeeds',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#rebase-a-merge-request
     */
    public function rebase($id, int $iid): array
    {
        return $this->httpClient
            ->put($this->encodeUrl(
                'projects/:id/merge_requests/:merge_request_iid/rebase',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#list-issues-that-will-close-on-merge
     */
    public function closesIssues($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/:id/merge_requests/:merge_request_iid/closes_issues',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#subscribe-to-a-merge-request
     */
    public function subscribe($id, int $iid): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/merge_requests/:merge_request_iid/subscribe',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#unsubscribe-from-a-merge-request
     */
    public function unsubscribe($id, int $iid): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/merge_requests/:merge_request_iid/unsubscribe',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#create-a-todo
     */
    public function createTodo($id, int $iid): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/merge_requests/:merge_request_iid/todo',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#get-mr-diff-versions
     */
    public function diffVersions($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/:id/merge_requests/:merge_request_iid/versions',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#get-a-single-mr-diff-version
     */
    public function diffVersion($id, int $iid, int $versionId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/merge_requests/:merge_request_iid/versions/:version_id',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#set-a-time-estimate-for-a-merge-request
     */
    public function setEstimatedTime($id, int $iid, string $duration): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/:id/merge_requests/:merge_request_iid/time_estimate',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#reset-the-time-estimate-for-a-merge-request
     */
    public function resetEstimatedTime($id, int $iid): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/merge_requests/:merge_request_iid/reset_time_estimate',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#add-spent-time-for-a-merge-request
     */
    public function createSpentTime($id, int $iid, string $duration): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/:id/merge_requests/:merge_request_iid/add_spent_time',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#reset-spent-time-for-a-merge-request
     */
    public function resetSpentTime($id, int $iid): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/merge_requests/:merge_request_iid/reset_spent_time',
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
     *
     * @see https://gitlab.com/help/api/merge_requests.md#get-time-tracking-stats
     */
    public function getTimeTrackingStatistic($id, int $iid): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/merge_requests/:merge_request_iid/time_stats',
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
