<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const null;
use function array_merge;

/**
 * Class Namespaces
 *
 * @package McMatters\GitlabApi\Resources
 */
class Namespaces extends AbstractResource
{
    /**
     * @param array $pagination
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list(array $pagination = []): array
    {
        return $this->requestGet($this->getUrl(), $pagination);
    }

    /**
     * @param string|null $search
     * @param array $pagination
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function search(string $search = null, array $pagination = []): array
    {
        return $this->requestGet(
            $this->getUrl(),
            array_merge($pagination, ['search' => $search])
        );
    }

    /**
     * @return string
     */
    protected function getUrl(): string
    {
        return 'namespaces';
    }
}
