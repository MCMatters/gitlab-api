<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Traits;

/**
 * Trait MilestoneTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait MilestoneTrait
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
     * @see https://gitlab.com/help/api/milestones.md#list-project-milestones
     * @see https://gitlab.com/help/api/group_milestones.md#list-group-milestones
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(':type/:id/milestones', [$this->type, $id]))
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
     * @param int $milestoneId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/milestones.md#get-single-milestone
     * @see https://gitlab.com/help/api/group_milestones.md#get-single-milestone
     */
    public function get($id, int $milestoneId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                ':type/:id/milestones/:milestone_id',
                [$this->type, $id, $milestoneId]
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
     * @see https://gitlab.com/help/api/milestones.md#create-new-milestone
     * @see https://gitlab.com/help/api/group_milestones.md#create-new-milestone
     */
    public function create($id, string $title, array $data = []): array
    {
        return $this->httpClient
            ->withJson(['title' => $title] + $data)
            ->post($this->encodeUrl(':type/:id/milestones', [$this->type, $id]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $milestoneId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/milestones.md#edit-milestone
     * @see https://gitlab.com/help/api/group_milestones.md#edit-milestone
     */
    public function update($id, int $milestoneId, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl(
                ':type/:id/milestones/:milestone_id',
                [$this->type, $id, $milestoneId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $milestoneId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/milestones.md#delete-project-milestone
     * @see https://gitlab.com/help/api/group_milestones.md#delete-group-milestone
     */
    public function delete($id, int $milestoneId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                ':type/:id/milestones/:milestone_id',
                [$this->type, $id, $milestoneId]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int $milestoneId
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/milestones.md#get-all-issues-assigned-to-a-single-milestone
     * @see https://gitlab.com/help/api/group_milestones.md#get-all-issues-assigned-to-a-single-milestone
     */
    public function issues($id, int $milestoneId, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                ':type/:id/milestones/:milestone_id/issues',
                [$this->type, $id, $milestoneId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $milestoneId
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/milestones.md#get-all-merge-requests-assigned-to-a-single-milestone
     * @see https://gitlab.com/help/api/group_milestones.md#get-all-merge-requests-assigned-to-a-single-milestone
     */
    public function mergeRequests(
        $id,
        int $milestoneId,
        array $query = []
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                ':type/:id/milestones/:milestone_id/merge_requests',
                [$this->type, $id, $milestoneId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $milestoneId
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/milestones.md#get-all-burndown-chart-events-for-a-single-milestone-starter
     * @see https://gitlab.com/help/api/group_milestones.md#get-all-burndown-chart-events-for-a-single-milestone-starter
     */
    public function burndownEvents(
        $id,
        int $milestoneId,
        array $query = []
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                ':type/:id/milestones/:milestone_id/burndown_events',
                [$this->type, $id, $milestoneId]
            ))
            ->json();
    }
}
