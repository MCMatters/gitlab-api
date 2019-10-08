<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class PageDomain
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class PageDomain extends StandaloneResource
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
     * @see https://gitlab.com/help/api/pages_domains.md#list-all-pages-domains
     */
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->get('pages/domains', ['query' => $query])
            ->json();
    }
}
