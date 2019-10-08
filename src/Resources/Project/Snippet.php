<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class ProjectSnippet
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Snippet extends ProjectResource
{
    /**
     * @param int|string $id
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/project_snippets.md#list-snippets
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/snippets', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $snippetId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/project_snippets.md#single-snippet
     */
    public function get($id, int $snippetId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/snippets/:snippet_id',
                [$id, $snippetId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $title
     * @param string $fileName
     * @param string $code
     * @param string $visibility
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/project_snippets.md#create-new-snippet
     */
    public function create(
        $id,
        string $title,
        string $fileName,
        string $code,
        string $visibility,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson([
                    'title' => $title,
                    'file_name' => $fileName,
                    'code' => $code,
                    'visibility' => $visibility,
                ] + $data
            )
            ->post($this->encodeUrl('projects/:id/snippets', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $snippetId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/project_snippets.md#update-snippet
     */
    public function update($id, int $snippetId, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl(
                'projects/:id/snippets/:snippet_id',
                [$id, $snippetId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $snippetId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/project_snippets.md#delete-snippet
     */
    public function delete($id, int $snippetId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/snippets/:snippet_id',
                [$id, $snippetId]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int $snippetId
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/project_snippets.md#snippet-content
     */
    public function rawContent($id, int $snippetId): string
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/snippets/:snippet_id/raw',
                [$id, $snippetId]
            ))
            ->getBody();
    }

    /**
     * @param int|string $id
     * @param int $snippetId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/project_snippets.md#get-user-agent-details
     */
    public function userAgentDetails($id, int $snippetId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/snippets/:snippet_id/user_agent_detail',
                [$id, $snippetId]
            ))
            ->json();
    }
}
