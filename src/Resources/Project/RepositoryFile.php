<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

use function array_key_exists, base64_decode;

use const false, null;

/**
 * Class RepositoryFile
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class RepositoryFile extends ProjectResource
{
    /**
     * @param int|string $id
     * @param string $filePath
     * @param string $ref
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/repository_files.md#get-file-from-repository
     */
    public function get($id, string $filePath, string $ref = 'master'): array
    {
        return $this->httpClient
            ->withQuery(['ref' => $ref])
            ->get($this->encodeUrl(
                'projects/:id/repository/files/:file_path',
                [$id, $filePath]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $filePath
     * @param string $ref
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/repository_files.md#get-file-from-repository
     */
    public function getMetadata(
        $id,
        string $filePath,
        string $ref = 'master'
    ): array {
        return $this->httpClient
            ->withQuery(['ref' => $ref])
            ->head($this->encodeUrl(
                'projects/:id/repository/files/:file_path',
                [$id, $filePath]
            ))
            ->getHeaders();
    }

    /**
     * @param int|string $id
     * @param string $filePath
     * @param string $ref
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/repository_files.md#get-file-blame-from-repository
     */
    public function getBlame(
        $id,
        string $filePath,
        string $ref = 'master'
    ): array {
        return $this->httpClient
            ->withQuery(['ref' => $ref])
            ->get($this->encodeUrl(
                'projects/:id/repository/files/:file_path/blame',
                [$id, $filePath]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $filePath
     * @param string $ref
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/repository_files.md#get-file-blame-from-repository
     */
    public function getBlameMetadata(
        $id,
        string $filePath,
        string $ref = 'master'
    ): array {
        return $this->httpClient
            ->withQuery(['ref' => $ref])
            ->head($this->encodeUrl(
                'projects/:id/repository/files/:file_path/blame',
                [$id, $filePath]
            ))
            ->getHeaders();
    }

    /**
     * @param int|string $id
     * @param string $filePath
     * @param string $ref
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/repository_files.md#get-raw-file-from-repository
     */
    public function getRaw(
        $id,
        string $filePath,
        string $ref = 'master'
    ): array {
        return $this->httpClient
            ->withQuery(['ref' => $ref])
            ->get($this->encodeUrl(
                'projects/:id/repository/files/:file_path/raw',
                [$id, $filePath]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $filePath
     * @param string $ref
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/repository_files.md#get-raw-file-from-repository
     */
    public function getRawMetadata(
        $id,
        string $filePath,
        string $ref = 'master'
    ): array {
        return $this->httpClient
            ->withQuery(['ref' => $ref])
            ->head($this->encodeUrl(
                'projects/:id/repository/files/:file_path/raw',
                [$id, $filePath]
            ))
            ->getHeaders();
    }

    /**
     * @param int|string $id
     * @param string $filePath
     * @param string $branch
     * @param string $content
     * @param string $commitMessage
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/repository_files.md#create-new-file-in-repository
     */
    public function create(
        $id,
        string $filePath,
        string $branch,
        string $content,
        string $commitMessage,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson([
                    'branch' => $branch,
                    'content' => $content,
                    'commit_message' => $commitMessage,
                ] + $data
            )
            ->post($this->encodeUrl(
                'projects/:id/repository/files/:file_path',
                [$id, $filePath]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $filePath
     * @param string $branch
     * @param string $content
     * @param string $commitMessage
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/repository_files.md#update-existing-file-in-repository
     */
    public function update(
        $id,
        string $filePath,
        string $branch,
        string $content,
        string $commitMessage,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson([
                    'branch' => $branch,
                    'content' => $content,
                    'commit_message' => $commitMessage,
                ] + $data
            )
            ->put($this->encodeUrl(
                'projects/:id/repository/files/:file_path',
                [$id, $filePath]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $filePath
     * @param string $branch
     * @param string $commitMessage
     * @param array $data
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/repository_files.md#delete-existing-file-in-repository
     */
    public function delete(
        $id,
        string $filePath,
        string $branch,
        string $commitMessage,
        array $data = []
    ): int {
        return $this->httpClient
            ->withJson([
                    'branch' => $branch,
                    'commit_message' => $commitMessage,
                ] + $data
            )
            ->delete($this->encodeUrl(
                'projects/:id/repository/files/:file_path',
                [$id, $filePath]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param string $filePath
     * @param string $ref
     *
     * @return string|null
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getContent(
        $id,
        string $filePath,
        string $ref = 'master'
    ): ?string {
        $info = $this->get($id, $filePath, $ref);

        if (!array_key_exists('content', $info)) {
            return null;
        }

        $content = base64_decode($info['content']);

        return false === $content ? null : $content;
    }
}
