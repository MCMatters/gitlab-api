<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class Issue
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Issue extends ProjectResource
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
     * @see https://gitlab.com/help/api/issues.md#list-project-issues
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/issues', $id))
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
     * @see https://gitlab.com/help/api/issues.md#single-issue
     */
    public function get($id, int $iid): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/issues/:issue_iid',
                [$id, $iid]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $title
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/issues.md#new-issue
     */
    public function create($id, string $title, array $data = []): array
    {
        return $this->httpClient
            ->withJson(['title' => $title] + $data)
            ->post($this->encodeUrl('projects/:id/issues', $id))
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
     * @see https://gitlab.com/help/api/issues.md#edit-issue
     */
    public function update($id, int $iid, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl('projects/:id/issues/:issue_iid', [$id, $iid]))
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
     * @see https://gitlab.com/help/api/issues.md#delete-an-issue
     */
    public function delete($id, int $iid): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl('projects/:id/issues/:issue_iid', [$id, $iid]))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $toProjectId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/issues.md#move-an-issue
     */
    public function move($id, int $iid, int $toProjectId): array
    {
        return $this->httpClient
            ->withJson(['to_project_id' => $toProjectId])
            ->post($this->encodeUrl('projects/:id/issues/:issue_iid/move', [$id, $iid]))
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
     * @see https://gitlab.com/help/api/issues.md#subscribe-to-an-issue
     */
    public function subscribe($id, int $iid): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/issues/:issue_iid/subscribe',
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
     * @see https://gitlab.com/help/api/issues.md#unsubscribe-from-an-issue
     */
    public function unsubscribe($id, int $iid): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/issues/:issue_iid/unsubscribe',
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
     * @see https://gitlab.com/help/api/issues.md#create-a-todo
     */
    public function createTodo($id, int $iid): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/issues/:issue_iid/todo',
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
     * @see https://gitlab.com/help/api/issues.md#set-a-time-estimate-for-an-issue
     */
    public function setEstimatedTime($id, int $iid, string $duration): array
    {
        return $this->httpClient
            ->withJson(['duration' => $duration])
            ->post($this->encodeUrl(
                'projects/:id/issues/:issue_iid/time_estimate',
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
     * @see https://gitlab.com/help/api/issues.md#reset-the-time-estimate-for-an-issue
     */
    public function resetEstimatedTime($id, int $iid): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/issues/:issue_iid/reset_time_estimate',
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
     * @see https://gitlab.com/help/api/issues.md#add-spent-time-for-an-issue
     */
    public function addSpentTime($id, int $iid, string $duration): array
    {
        return $this->httpClient
            ->withJson(['duration' => $duration])
            ->post($this->encodeUrl(
                'projects/:id/issues/:issue_iid/add_spent_time',
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
     * @see https://gitlab.com/help/api/issues.md#reset-spent-time-for-an-issue
     */
    public function resetSpentTime($id, int $iid): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/issues/:issue_iid/reset_spent_time',
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
     * @see https://gitlab.com/help/api/issues.md#get-time-tracking-stats
     */
    public function getTimeTrackingStatistic($id, int $iid): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/issues/:issue_iid/time_stats',
                [$id, $iid])
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
     * @see https://gitlab.com/help/api/issues.md#list-merge-requests-related-to-issue
     */
    public function relatedMergeRequests(
        $id,
        int $iid,
        array $query = []
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                'projects/:id/issues/:issue_id/related_merge_requests',
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
     * @see https://gitlab.com/help/api/issues.md#list-merge-requests-that-will-close-issue-on-merge
     */
    public function closeableMergeRequests(
        $id,
        int $iid,
        array $query = []
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                'projects/:id/issues/:issue_id/closed_by',
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
     * @see https://gitlab.com/help/api/issues.md#participants-on-issues
     */
    public function participants($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                'projects/:id/issues/:issue_id/participants',
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
     * @see https://gitlab.com/help/api/issues.md#get-user-agent-details
     */
    public function userAgentDetails($id, int $iid): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/issues/:issue_id/user_agent_detail',
                [$id, $iid]
            ))
            ->json();
    }
}
