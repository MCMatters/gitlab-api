<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;

/**
 * Class MergeRequest
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class MergeRequest extends GroupResource
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
     * @see https://gitlab.com/help/api/merge_requests.md#list-group-merge-requests
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('groups/:id/merge_requests', $id),
                ['query' => $query]
            )
            ->json();
    }
}
