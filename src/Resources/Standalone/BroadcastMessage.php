<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class BroadcastMessage
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class BroadcastMessage extends StandaloneResource
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
     * @see https://gitlab.com/help/api/broadcast_messages.md#get-all-broadcast-messages
     */
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('broadcast_messages')
            ->json();
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
     * @param int $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/broadcast_messages.md#get-a-specific-broadcast-message
     */
    public function get(int $id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('broadcast_messages/:id', $id))
            ->json();
    }

    /**
     * @param string $message
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/broadcast_messages.md#create-a-broadcast-message
     */
    public function create(string $message, array $data = []): array
    {
        return $this->httpClient
            ->withJson(['message' => $message] + $data)
            ->post('broadcast_messages')
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
     * @see https://gitlab.com/help/api/broadcast_messages.md#update-a-broadcast-message
     */
    public function update(int $id, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl('broadcast_messages/:id', $id))
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
     * @see https://gitlab.com/help/api/broadcast_messages.md#delete-a-broadcast-message
     */
    public function delete(int $id): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl('broadcast_messages/:id', $id))
            ->getStatusCode();
    }
}
