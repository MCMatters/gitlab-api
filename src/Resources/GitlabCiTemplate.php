<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;

/**
 * Class GitlabCiTemplate
 *
 * @package McMatters\GitlabApi\Resources
 */
class GitlabCiTemplate extends AbstractResource
{
    /**
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list(): array
    {
        return $this->requestGet($this->getUrl());
    }

    /**
     * @param string $key
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get(string $key): array
    {
        return $this->requestGet($this->getUrl($key));
    }

    /**
     * @param string|null $key
     *
     * @return string
     */
    protected function getUrl(string $key = null): string
    {
        $url = 'templates/gitlab_ci_ymls';

        return null !== $key ? "{$url}/{$key}" : $url;
    }
}
