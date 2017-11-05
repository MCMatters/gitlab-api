<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const null;
use function array_filter;

/**
 * Class Environment
 *
 * @package McMatters\GitlabApi\Resources
 */
class Environment extends AbstractResource
{
    /**
     * @param int|string $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list($id): array
    {
        return $this->requestGet($this->getUrl($id));
    }

    /**
     * @param int|string $id
     * @param string $name
     * @param string|null $externalUrl
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create($id, string $name, string $externalUrl = null): array
    {
        return $this->requestPost(
            $this->getUrl($id),
            array_filter(['name' => $name, 'external_url' => $externalUrl])
        );
    }

    /**
     * @param int|string $id
     * @param int $environmentId
     * @param string|null $name
     * @param string|null $externalUrl
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function update(
        $id,
        int $environmentId,
        string $name = null,
        string $externalUrl = null
    ): array {
        return $this->requestPut(
            $this->getUrl($id, $environmentId),
            array_filter(['name' => $name, 'external_url' => $externalUrl])
        );
    }

    /**
     * @param int|string $id
     * @param int $environmentId
     *
     * @return int
     * @throws RequestException
     */
    public function delete($id, int $environmentId): int
    {
        return $this->requestDelete($this->getUrl($id, $environmentId));
    }

    /**
     * @param int|string $id
     * @param int $environmentId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function stop($id, int $environmentId): array
    {
        return $this->requestPost("{$this->getUrl($id, $environmentId)}/stop");
    }

    /**
     * @param int|string $id
     * @param int|null $environmentId
     *
     * @return string
     */
    protected function getUrl($id, int $environmentId = null): string
    {
        $url = "projects/{$this->encode($id)}/environments";

        return null !== $environmentId ? "{$url}/{$environmentId}" : $url;
    }
}
