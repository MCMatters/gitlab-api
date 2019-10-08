<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class IssueLink
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class IssueLink extends ProjectResource
{
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
            ->get(
                $this->encodeUrl(
                    'projects/:id/issues/:issue_iid/links',
                    [$id, $iid]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param $id
     * @param int $iid
     * @param $targetProjectId
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
            ->post(
                $this->encodeUrl('projects/:id/issues/:issue_iid/links', [$id, $iid]),
                [
                    'json' => [
                        'target_project_id' => $targetProjectId,
                        'target_issue_iid' => $targetIssueId,
                    ],
                ]
            )
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
