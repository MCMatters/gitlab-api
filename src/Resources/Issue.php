<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class Issue
 *
 * @package McMatters\GitlabApi\Resources
 */
class Issue extends AbstractResource
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
        return $this->httpClient->get('issues', ['query' => $query])->json();
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
                $this->encodeUrl('groups/{id}/issues', $id),
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
    public function projectList($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/issues', $id),
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
    public function get($id, int $iid): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('projects/{id}/issues/{iid}', [$id, $iid]))
            ->json();
    }

    /**
     * @param $id
     * @param string $title
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create($id, string $title, array $data = []): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/issues', $id),
                ['json' => ['title' => $title] + $data]
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
                $this->encodeUrl('projects/{id}/issues/{iid}', [$id, $iid]),
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
                'projects/{id}/issues/{iid}',
                [$id, $iid]
            ))
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
     */
    public function move($id, int $iid, int $toProjectId): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/{id}/issues/{iid}/move',
                    [$id, $iid]
                ),
                ['json' => ['to_project_id' => $toProjectId]]
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
                'projects/{id}/issues/{iid}/subscribe',
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
                'projects/{id}/issues/{iid}/unsubscribe',
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
                'projects/{id}/issues/{iid}/todo',
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
    public function setEstimatedTime($id, int $iid, string $duration): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/{id}/issues/{iid}/time_estimate',
                    [$id, $iid]
                ),
                ['query' => ['duration' => $duration]]
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
                'projects/{id}/issues/{iid}/reset_time_estimate',
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
    public function addSpentTime($id, int $iid, string $duration): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/{id}/issues/{iid}/add_spent_time',
                    [$id, $iid]
                ),
                ['query' => ['duration' => $duration]]
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
                'projects/{id}/issues/{iid}/reset_spent_time',
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
    public function timeTrackingStatistic($id, int $iid): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/issues/{iid}/time_stats',
                [$id, $iid])
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
    public function closeableMergeRequests($id, int $iid): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/issues/{iid}/closed_by',
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
    public function participants($id, int $iid): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/issues/{iid}/participants',
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
    public function userAgentDetails($id, int $iid): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/issues/{iid}/user_agent_detail',
                [$id, $iid]
            ))
            ->json();
    }
}
