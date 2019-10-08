<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Template;

use McMatters\GitlabApi\Resources\TemplateResource;

/**
 * Class License
 *
 * @package McMatters\GitlabApi\Resources\Template
 */
class License extends TemplateResource
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
     * @see https://gitlab.com/help/api/templates/licenses.md#list-license-templates
     */
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->get('templates/licenses', ['query' => $query])
            ->json();
    }

    /**
     * @param string $key
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/templates/licenses.md#single-license-template
     */
    public function get(string $key, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('templates/licenses/:key', $key),
                ['query' => $query]
            )
            ->json();
    }
}
