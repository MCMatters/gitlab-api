<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class Snippet
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class Snippet extends StandaloneResource
{
    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/snippets.md#list-all-snippets-for-a-user
     */
    public function list(array $query = []): array
    {
        return $this->httpClient->get('snippets', ['query' => $query])->json();
    }

    /**
     * @param int $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/snippets.md#get-a-single-snippet
     */
    public function get(int $id): array
    {
        return $this->httpClient->get("snippets/{$id}")->json();
    }

    /**
     * @param int $id
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/project_snippets.md#snippet-content
     */
    public function rawContent(int $id): string
    {
        return $this->httpClient->get("snippets/{$id}/raw")->getBody();
    }

    /**
     * @param string $title
     * @param string $fileName
     * @param string $content
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/snippets.md#create-new-snippet
     */
    public function create(
        string $title,
        string $fileName,
        string $content,
        array $data = []
    ): array {
        return $this->httpClient
            ->post(
                'snippets',
                [
                    'json' => [
                        'title' => $title,
                        'file_name' => $fileName,
                        'content' => $content,
                    ] + $data,
                ]
            )
            ->json();
    }

    /**
     * @param int $id
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/snippets.md#update-snippet
     */
    public function update(int $id, array $data): array
    {
        return $this->httpClient
            ->put("snippets/{$id}", ['json' => $data])
            ->json();
    }

    /**
     * @param int $id
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/snippets.md#delete-snippet
     */
    public function delete(int $id): int
    {
        return $this->httpClient->delete("snippets/{$id}")->getStatusCode();
    }

    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/snippets.md#list-all-public-snippets
     */
    public function listPublic(array $query = []): array
    {
        return $this->httpClient
            ->get('snippets/public', ['query' => $query])
            ->json();
    }

    /**
     * @param int $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/snippets.md#get-user-agent-details
     */
    public function userAgentDetails(int $id): array
    {
        return $this->httpClient
            ->get("snippets/{$id}/user_agent_detail")
            ->json();
    }
}
