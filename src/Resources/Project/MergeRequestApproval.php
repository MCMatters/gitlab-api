<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class MergeRequestApproval
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class MergeRequestApproval extends ProjectResource
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
     * @see https://gitlab.com/help/api/merge_request_approvals.md#get-configuration
     */
    public function projectLevelList($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/:id/approvals', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/merge_request_approvals.md#change-configuration
     */
    public function projectLevelUpdate($id, array $data = []): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/:id/approvals', $id),
                ['json' => $data]
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
     *
     * @see https://gitlab.com/help/api/merge_request_approvals.md#get-project-level-rules
     */
    public function projectLevelRules($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/:id/approval_rules', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $name
     * @param int $approvalsRequired
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/merge_request_approvals.md#create-project-level-rule
     */
    public function createProjectLevelRule(
        $id,
        string $name,
        int $approvalsRequired,
        array $data = []
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/:id/approval_rules', $id),
                [
                    'json' => [
                        'name' => $name,
                        'approvals_required' => $approvalsRequired
                    ] + $data,
                ]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $approvalRuleId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/merge_request_approvals.md#update-project-level-rule
     */
    public function updateProjectLevelRule(
        $id,
        int $approvalRuleId,
        array $data
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/:id/approval_rules/:approval_rule_id',
                    [$id, $approvalRuleId]
                ),
                ['json' => $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $approvalRuleId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/merge_request_approvals.md#delete-project-level-rule
     */
    public function deleteProjectLevelRule($id, int $approvalRuleId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/approval_rules/:approval_rule_id',
                [$id, $approvalRuleId]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/merge_request_approvals.md#change-allowed-approvers
     */
    public function updateProjectLevelApprovers($id, array $data): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl('projects/:id/approvers', $id),
                ['json' => $data]
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
     * @see https://gitlab.com/help/api/merge_request_approvals.md#get-configuration-1
     */
    public function mergeRequestLevelList($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/:id/merge_requests/:merge_request_iid/approvals',
                    [$id, $iid]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $approvalsRequired
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/merge_request_approvals.md#get-configuration-1
     */
    public function mergeRequestLevelUpdate(
        $id,
        int $iid,
        int $approvalsRequired,
        array $data = []
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/:id/merge_requests/:merge_request_iid/approvals',
                    [$id, $iid, $approvalsRequired]
                ),
                [
                    'json' => [
                        'approvals_required' => $approvalsRequired,
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
     * @see https://gitlab.com/help/api/merge_request_approvals.md#change-allowed-approvers-for-merge-request
     */
    public function updateMergeRequestLevelApprovers(
        $id,
        int $iid,
        array $data
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/:id/merge_requests/:merge_request_iid/approvers',
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
     * @see https://gitlab.com/help/api/merge_request_approvals.md#get-the-approval-state-of-merge-requests
     */
    public function getMergeRequestLevelApprovalState($id, int $iid): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/merge_requests/:merge_request_iid/approval_state',
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
     * @see https://gitlab.com/help/api/merge_request_approvals.md#get-merge-request-level-rules
     */
    public function mergeRequestLevelRules($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/:id/merge_requests/:merge_request_iid/approval_rules',
                    [$id, $iid]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param string $name
     * @param int $approvalsRequired
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/merge_request_approvals.md#create-merge-request-level-rule
     */
    public function createMergeRequestLevelRule(
        $id,
        int $iid,
        string $name,
        int $approvalsRequired,
        array $data = []
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/:id/merge_requests/:merge_request_iid/approval_rules',
                    [$id, $iid]
                ),
                [
                    'json' => [
                        'name' => $name,
                        'approvals_required' => $approvalsRequired,
                    ] + $data,
                ]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $approvalRuleId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/merge_request_approvals.md#update-merge-request-level-rule
     */
    public function updateMergeRequestLevelRule(
        $id,
        int $iid,
        int $approvalRuleId,
        array $data
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/:id/merge_request/:merge_request_iid/approval_rules/:approval_rule_id',
                    [$id, $iid, $approvalRuleId]
                ),
                ['json' => $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $approvalRuleId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/merge_request_approvals.md#delete-merge-request-level-rule
     */
    public function deleteMergeRequesLevelRule($id, int $iid, int $approvalRuleId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/merge_requests/:merge_request_iid/approval_rules/:approval_rule_id',
                [$id, $iid, $approvalRuleId]
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
     * @see https://gitlab.com/help/api/merge_request_approvals.md#approve-merge-request
     */
    public function approve($id, int $iid, array $data = []): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/:id/merge_requests/:merge_request_iid/approve',
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
     * @see https://gitlab.com/help/api/merge_request_approvals.md#unapprove-merge-request
     */
    public function unapprove($id, int $iid): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/merge_requests/:merge_request_iid/unapprove',
                [$id, $iid]
            ))
            ->getStatusCode();
    }
}
