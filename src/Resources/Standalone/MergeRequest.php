<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class MergeRequest
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class MergeRequest extends StandaloneResource
{
    use HasAllTrait;

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
            ->withQuery($query)
            ->get('merge_requests')
            ->json();
    }

    /**
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): array
    {
        return $this->fetchAllResources('list', [$query]);
    }
}
