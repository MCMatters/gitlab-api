<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class BroadcastMessage
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class BroadcastMessage extends StandaloneResource
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
     * @see https://gitlab.com/help/api/broadcast_messages.md#get-all-broadcast-messages
     */
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->get('broadcast_messages', ['query' => $query])
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
            ->post(
                'broadcast_messages',
                ['json' => ['message' => $message] + $data]
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
     * @see https://gitlab.com/help/api/broadcast_messages.md#update-a-broadcast-message
     */
    public function update(int $id, array $data): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl('broadcast_messages/:id', $id),
                ['json' => $data]
            )
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
