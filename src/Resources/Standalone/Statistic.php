<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class Statistic
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class Statistic extends StandaloneResource
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
     * @see https://gitlab.com/help/api/statistics.md#get-current-application-statistics
     */
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->get('application/statistics', ['query' => $query])
            ->json();
    }
}
