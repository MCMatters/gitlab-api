<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const null;
use function array_merge;

/**
 * Class Group
 *
 * @package McMatters\GitlabApi\Resources
 */
class Group extends AbstractResource
{
    /**
     * @param array $filters
     * @param array $sorting
     * @param array $pagination
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list(
        array $filters = [],
        array $sorting = [],
        array $pagination = []
    ): array {
        return $this->requestGet(
            $this->getUrl(),
            array_merge($filters, $sorting, $pagination)
        );
    }

    /**
     * @param int|string $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get($id): array
    {
        return $this->requestGet($this->getUrl($id));
    }

    /**
     * @param string $name
     * @param string $path
     * @param array $data
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create(string $name, string $path, array $data = []): array
    {
        return $this->requestPost(
            $this->getUrl(),
            array_merge($data, ['name' => $name, 'path' => $path])
        );
    }

    /**
     * @param int|string $id
     * @param array $data
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function update($id, array $data = []): array
    {
        return $this->requestPut($this->getUrl($id), $data);
    }

    /**
     * @param int|string $id
     *
     * @return int
     * @throws RequestException
     */
    public function delete($id): int
    {
        return $this->requestDelete($this->getUrl($id));
    }

    /**
     * @param string $keyword
     * @param array $filters
     * @param array $sorting
     * @param array $pagination
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function search(
        string $keyword,
        array $filters = [],
        array $sorting = [],
        array $pagination = []
    ): array {
        $filters['search'] = $keyword;

        return $this->list($filters, $sorting, $pagination);
    }

    /**
     * @param int|string $id
     * @param array $filters
     * @param array $sorting
     * @param array $pagination
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function projects(
        $id,
        array $filters = [],
        array $sorting = [],
        array $pagination = []
    ): array {
        return $this->requestGet(
            "{$this->getUrl($id)}/projects",
            array_merge($filters, $sorting, $pagination)
        );
    }

    /**
     * @param int|string $id
     * @param int|string $projectId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function transferProject($id, $projectId): array
    {
        return $this->requestPost(
            "{$this->getUrl($id)}/projects/{$this->encode($projectId)}"
        );
    }

    /**
     * @param int|string|null $id
     *
     * @return string
     */
    protected function getUrl($id = null): string
    {
        return null !== $id ? "groups/{$this->encode($id)}" : 'groups';
    }
}
