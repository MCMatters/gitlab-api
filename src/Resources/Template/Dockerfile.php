<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Template;

use McMatters\GitlabApi\Resources\TemplateResource;

/**
 * Class Dockerfile
 *
 * @package McMatters\GitlabApi\Resources\Template
 */
class Dockerfile extends TemplateResource
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
     * @see https://gitlab.com/help/api/templates/dockerfiles.md#list-dockerfile-templates
     */
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->get('templates/dockerfiles', ['query' => $query])
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
     * @see https://gitlab.com/help/api/templates/dockerfiles.md#single-dockerfile-template
     */
    public function get(string $key): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('templates/dockerfiles/:key', $key))
            ->json();
    }
}
