<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class SystemHook
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class SystemHook extends StandaloneResource
{
    use HasAllTrait;

    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/system_hooks.md#list-system-hooks
     */
    public function list(array $query = []): array
    {
        return $this->httpClient->withQuery($query)->get('hooks')->json();
    }

    /**
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): array
    {
        return $this->fetchAllResources('list', [$query]);
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
     *
     * @see https://gitlab.com/help/api/system_hooks.md#add-new-system-hook
     */
    public function create(string $url, array $data = []): array
    {
        return $this->httpClient
            ->withJson(['url' => $url] + $data)
            ->post('hooks')
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
     * @see https://gitlab.com/help/api/system_hooks.md#test-system-hook
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
     *
     * @see https://gitlab.com/help/api/system_hooks.md#delete-system-hook
     */
    public function delete(int $id): int
    {
        return $this->httpClient->delete("hooks/{$id}")->getStatusCode();
    }
}
