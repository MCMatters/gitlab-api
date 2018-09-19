<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class GitlabCiTemplate
 *
 * @package McMatters\GitlabApi\Resources
 */
class GitlabCiTemplate extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->get('templates/gitlab_ci_ymls', ['query' => $query])
            ->json();
    }

    /**
     * @param string $key
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(string $key): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('templates/gitlab_ci_ymls/{key}', $key))
            ->json();
    }
}
