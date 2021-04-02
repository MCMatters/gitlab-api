<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class EpicIssue
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class EpicIssue extends GroupResource
{
    use HasAllTrait;

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
     * @see https://gitlab.com/help/api/epic_issues.md#list-issues-for-an-epic
     */
    public function list($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('groups/:id/epics/:epic_iid/issues', [$id, $iid]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param array $query
     *
     * @return array
     */
    public function all($id, int $iid, array $query = []): array
    {
        return $this->fetchAllResources('list', [$id, $iid, $query]);
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $issueId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/epic_issues.md#assign-an-issue-to-the-epic
     */
    public function create($id, int $iid, int $issueId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'groups/:id/epics/:epic_iid/issues/:issue_id',
                [$id, $iid, $issueId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $epicIssueId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/epic_issues.md#remove-an-issue-from-the-epic
     */
    public function delete($id, int $iid, int $epicIssueId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'groups/:id/epics/:epic_iid/issues/:epic_issue_id',
                [$id, $iid, $epicIssueId]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $epicIssueId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/epic_issues.md#update-epic-issue-association
     */
    public function update(
        $id,
        int $iid,
        int $epicIssueId,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl(
                'groups/:id/epics/:epic_iid/issues/:epic_issue_id',
                [$id, $iid, $epicIssueId]
            ))
            ->json();
    }
}
