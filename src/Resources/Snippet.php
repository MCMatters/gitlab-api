<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class Snippet
 *
 * @package McMatters\GitlabApi\Resources
 */
class Snippet extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
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
     */
    public function get(int $id): array
    {
        return $this->httpClient->get("snippets/{$id}")->json();
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
     */
    public function userAgentDetails(int $id): array
    {
        return $this->httpClient
            ->get("snippets/{$id}/user_agent_detail")
            ->json();
    }
}
