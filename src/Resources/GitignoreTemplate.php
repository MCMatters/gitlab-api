<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class GitignoreTemplate
 *
 * @package McMatters\GitlabApi\Resources
 */
class GitignoreTemplate extends AbstractResource
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
            ->get('templates/gitignores', ['query' => $query])
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
            ->get($this->encodeUrl('templates/gitignores/{key}', $key))
            ->json();
    }
}
