<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const null;
use function array_filter;

/**
 * Class Runner
 *
 * @package McMatters\GitlabApi\Resources
 */
class Runner extends AbstractResource
{
    /**
     * @param string|null $scope
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list(string $scope = null): array
    {
        return $this->requestGet(
            $this->getUrl(),
            array_filter(['scope' => $scope])
        );
    }

    /**
     * @param string|null $scope
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function all(string $scope = null): array
    {
        return $this->requestGet(
            "{$this->getUrl()}/all",
            array_filter(['scope' => $scope])
        );
    }

    /**
     * @param int $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get(int $id): array
    {
        return $this->requestGet($this->getUrl($id));
    }

    /**
     * @param int $id
     * @param array $data
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function update(int $id, array $data = []): array
    {
        return $this->requestPut($this->getUrl($id), $data);
    }

    /**
     * @param int $id
     *
     * @return int
     * @throws RequestException
     */
    public function delete(int $id): int
    {
        return $this->requestDelete($this->getUrl($id));
    }

    /**
     * @param int|string $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function listFromProjects($id): array
    {
        return $this->requestGet($this->getUrl(null, $id));
    }

    /**
     * @param int|string $id
     * @param int $runnerId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function enableInProject($id, int $runnerId): array
    {
        return $this->requestPost(
            $this->getUrl(null, $id),
            ['runner_id' => $runnerId]
        );
    }

    /**
     * @param int|string $id
     * @param int $runnerId
     *
     * @return int
     * @throws RequestException
     */
    public function disableInProject($id, int $runnerId): int
    {
        return $this->requestDelete($this->getUrl($runnerId, $id));
    }

    /**
     * @param int|null $id
     * @param int|string|null $projectId
     *
     * @return string
     */
    protected function getUrl(int $id = null, $projectId = null): string
    {
        $url = null !== $projectId
            ? "projects/{$this->encode($projectId)}/runners"
            : 'runners';

        return null !== $id ? "{$url}/{$id}" : $url;
    }
}
