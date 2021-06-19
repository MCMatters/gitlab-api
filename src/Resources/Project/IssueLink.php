<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class IssueLink
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class IssueLink extends ProjectResource
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
     * @see https://gitlab.com/help/api/issue_links.md#list-issue-relations
     */
    public function list($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                'projects/:id/issues/:issue_iid/links',
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
     */
    public function all($id, int $iid, array $query = []): array
    {
        return $this->fetchAllResources('list', [$id, $iid, $query]);
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int|string $targetProjectId
     * @param int|string $targetIssueId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/issue_links.md#create-an-issue-link
     */
    public function create(
        $id,
        int $iid,
        $targetProjectId,
        $targetIssueId
    ): array {
        return $this->httpClient
            ->withJson([
                'target_project_id' => $targetProjectId,
                'target_issue_iid' => $targetIssueId,
            ])
            ->post($this->encodeUrl('projects/:id/issues/:issue_iid/links', [$id, $iid]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int|string $issueLinkId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/issue_links.md#delete-an-issue-link
     */
    public function delete($id, int $iid, $issueLinkId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/issues/:issue_iid/links/:issue_link_id',
                [$id, $iid, $issueLinkId]
            ))
            ->getStatusCode();
    }
}
