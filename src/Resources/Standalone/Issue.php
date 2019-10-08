<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class Issue
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class Issue extends StandaloneResource
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
     * @see https://gitlab.com/help/api/issues.md#list-issues
     */
    public function list(array $query = []): array
    {
        return $this->httpClient->get('issues', ['query' => $query])->json();
    }
}
