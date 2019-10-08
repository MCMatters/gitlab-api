<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Template;

use McMatters\GitlabApi\Resources\TemplateResource;

/**
 * Class Gitignore
 *
 * @package McMatters\GitlabApi\Resources\Template
 */
class Gitignore extends TemplateResource
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
     * @see https://gitlab.com/help/api/templates/gitignores.md#list-gitignore-templates
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
     *
     * @see https://gitlab.com/help/api/templates/gitignores.md#single-gitignore-template
     */
    public function get(string $key): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('templates/gitignores/:key', $key))
            ->json();
    }
}
