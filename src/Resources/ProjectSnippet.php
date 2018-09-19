<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class ProjectSnippet
 *
 * @package McMatters\GitlabApi\Resources
 */
class ProjectSnippet extends AbstractResource
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
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/snippets', $id),
                ['query' => $query]
            )
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
     */
    public function get($id, int $snippetId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/snippets/{snippetId}',
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
            ->post(
                $this->encodeUrl('projects/{id}/snippets', $id),
                [
                    'json' => [
                        'title' => $title,
                        'file_name' => $fileName,
                        'code' => $code,
                        'visibility' => $visibility,
                    ] + $data,
                ]
            )
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
     */
    public function update($id, int $snippetId, array $data): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/{id}/snippets/{snippetId}',
                    [$id, $snippetId]
                ),
                ['json' => $data]
            )
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
     */
    public function delete($id, int $snippetId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/{id}/snippets/{snippetId}',
                [$id, $snippetId]
            ))
            ->getStatusCode();
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
     */
    public function rawContent($id, int $snippetId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/snippets/{snippetId}/raw',
                [$id, $snippetId]
            ))
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
     */
    public function userAgentDetails($id, int $snippetId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/snippets/{snippetId}/user_agent_detail',
                [$id, $snippetId]
            ))
            ->json();
    }
}
