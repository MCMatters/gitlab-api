<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Template;

use McMatters\GitlabApi\Resources\TemplateResource;

/**
 * Class GitlabCi
 *
 * @package McMatters\GitlabApi\Resources\Template
 */
class GitlabCi extends TemplateResource
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
     * @see https://gitlab.com/help/api/templates/gitlab_ci_ymls.md#list-gitlab-ci-yml-templates
     */
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('templates/gitlab_ci_ymls')
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
     * @see https://gitlab.com/help/api/templates/gitlab_ci_ymls.md#single-gitlab-ci-yml-template
     */
    public function get(string $key): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('templates/gitlab_ci_ymls/:key', $key))
            ->json();
    }
}
