<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const null;
use function array_filter;

/**
 * Class LicenseTemplate
 *
 * @package McMatters\GitlabApi\Resources
 */
class LicenseTemplate extends AbstractResource
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
     * @param string|null $project
     * @param string|null $fullName
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get(
        string $key,
        string $project = null,
        string $fullName = null
    ): array {
        return $this->requestGet(
            $this->getUrl($key),
            array_filter(['project' => $project, 'fullname' => $fullName])
        );
    }

    /**
     * @param string|null $key
     *
     * @return string
     */
    protected function getUrl(string $key = null): string
    {
        $url = 'templates/licenses';

        return null !== $key ? "{$url}/{$key}" : $url;
    }
}
