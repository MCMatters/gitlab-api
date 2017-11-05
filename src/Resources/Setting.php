<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;

/**
 * Class Setting
 *
 * @package McMatters\GitlabApi\Resources
 */
class Setting extends AbstractResource
{
    /**
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get(): array
    {
        return $this->requestGet($this->getUrl());
    }

    /**
     * @param array $data
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function update(array $data = []): array
    {
        return $this->requestPut($this->getUrl(), $data);
    }

    /**
     * @return string
     */
    protected function getUrl(): string
    {
        return 'application/settings';
    }
}
