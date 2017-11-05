<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const null;

/**
 * Class GitignoreTemplate
 *
 * @package McMatters\GitlabApi\Resources
 */
class GitignoreTemplate extends AbstractResource
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
        $url = 'templates/gitignores';

        return null !== $key ? "{$url}/{$key}" : $url;
    }
}
