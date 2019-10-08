<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class MergeRequest
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class MergeRequest extends StandaloneResource
{
    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/merge_requests.md#list-merge-requests
     */
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->get('merge_requests', ['query' => $query])
            ->json();
    }
}
