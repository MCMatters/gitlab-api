<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class Event
 *
 * @package McMatters\GitlabApi\Resources
 */
class Event extends AbstractResource
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
        return $this->httpClient->get('events', ['query' => $query])->json();
    }

    /**
     * @param int $id
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function userList(int $id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('users/{id}/events', $id),
                ['query' => $query]
            )
            ->json();
    }

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
    public function projectList($id, array $query = []): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('{id}/events', $id), ['query' => $query])
            ->json();
    }
}
