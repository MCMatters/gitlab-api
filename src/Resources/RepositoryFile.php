<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use function array_merge;

/**
 * Class RepositoryFile
 *
 * @package McMatters\GitlabApi\Resources
 */
class RepositoryFile extends AbstractResource
{
    /**
     * @param int|string $id
     * @param string $file
     * @param string $ref
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get($id, string $file, string $ref): array
    {
        return $this->requestGet($this->getUrl($id, $file), ['ref' => $ref]);
    }

    /**
     * @param int|string $id
     * @param string $file
     * @param string $ref
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function getRaw($id, string $file, string $ref): array
    {
        return $this->requestGet(
            "{$this->getUrl($id, $file)}/raw",
            ['ref' => $ref]
        );
    }

    /**
     * @param int|string $id
     * @param string $file
     * @param string $branch
     * @param string $content
     * @param string $message
     * @param array $data
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create(
        $id,
        string $file,
        string $branch,
        string $content,
        string $message,
        array $data = []
    ): array {
        $data = array_merge(
            $data,
            [
                'branch'         => $branch,
                'content'        => $content,
                'commit_message' => $message,
            ]
        );

        return $this->requestPost($this->getUrl($id, $file), $data);
    }

    /**
     * @param int|string $id
     * @param string $file
     * @param string $branch
     * @param string $content
     * @param string $message
     * @param array $data
     *
     * @return array
     * @throws ResponseException
     * @throws RequestException
     */
    public function update(
        $id,
        string $file,
        string $branch,
        string $content,
        string $message,
        array $data = []
    ): array {
        $data = array_merge(
            $data,
            [
                'branch'         => $branch,
                'content'        => $content,
                'commit_message' => $message,
            ]
        );

        return $this->requestPut($this->getUrl($id, $file), $data);
    }

    /**
     * @param int|string $id
     * @param string $file
     * @param string $branch
     * @param string $message
     * @param array $data
     *
     * @return int
     * @throws RequestException
     */
    public function delete(
        $id,
        string $file,
        string $branch,
        string $message,
        array $data = []
    ): int {
        $data = array_merge(
            $data,
            [
                'branch'         => $branch,
                'commit_message' => $message,
            ]
        );

        return $this->requestDelete(
            "projects/{$id}/repository/files/{$file}",
            $data
        );
    }

    /**
     * @param int|string $id
     * @param string $file
     *
     * @return string
     */
    protected function getUrl($id, string $file): string
    {
        list($id, $file) = $this->encode([$id, $file]);

        return "projects/{$id}/repository/files/{$file}";
    }
}
