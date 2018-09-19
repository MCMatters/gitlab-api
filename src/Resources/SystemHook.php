<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class SystemHook
 *
 * @package McMatters\GitlabApi\Resources
 */
class SystemHook extends AbstractResource
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
        return $this->httpClient->get('hooks', ['query' => $query])->json();
    }

    /**
     * @param string $url
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create(string $url, array $data = []): array
    {
        return $this->httpClient
            ->post('hooks', ['json' => ['url' => $url] + $data])
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
    public function test(int $id): array
    {
        return $this->httpClient->get("hooks/{$id}")->json();
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
        return $this->httpClient->delete("hooks/{$id}")->getStatusCode();
    }
}
