<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const false, null;
use function array_key_exists, base64_decode;

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
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get($id, string $file, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/repository/files/{file}',
                    [$id, $file]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $file
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getRaw($id, string $file, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/repository/files/{file}/raw',
                    [$id, $file]
                ),
                ['query' => $query]
            )
            ->json();
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
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create(
        $id,
        string $file,
        string $branch,
        string $content,
        string $message,
        array $data = []
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/{id}/repository/files/{file}',
                    [$id, $file]
                ),
                [
                    'json' => [
                        'branch' => $branch,
                        'content' => $content,
                        'commit_message' => $message,
                    ] + $data,
                ]
            )
            ->json();
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
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update(
        $id,
        string $file,
        string $branch,
        string $content,
        string $message,
        array $data = []
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/{id}/repository/files/{file}',
                    [$id, $file]
                ),
                [
                    'json' => [
                        'branch' => $branch,
                        'content' => $content,
                        'commit_message' => $message,
                    ] + $data,
                ]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $file
     * @param string $branch
     * @param string $message
     * @param array $query
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function delete(
        $id,
        string $file,
        string $branch,
        string $message,
        array $query = []
    ): int {
        return $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'projects/{id}/repository/files/{file}',
                    [$id, $file]
                ),
                [
                    'query' => [
                        'branch' => $branch,
                        'commit_message' => $message,
                    ] + $query,
                ]
            )
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param string $file
     * @param array $query
     *
     * @return string|null
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getContent($id, string $file, array $query = [])
    {
        $info = $this->get($id, $file, $query);

        if (!array_key_exists('content', $info)) {
            return null;
        }

        $content = base64_decode($info['content']);

        return false === $content ? null : $content;
    }
}
