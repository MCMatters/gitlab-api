<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class IssueStatistic
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class IssueStatistic extends StandaloneResource
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
     * @see https://gitlab.com/help/api/issues_statistics.md#get-project-issues-statistics
     */
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('issues_statistics')
            ->json();
    }
}
