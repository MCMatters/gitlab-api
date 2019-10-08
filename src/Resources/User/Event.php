<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\User;

use McMatters\GitlabApi\Resources\UserResource;

/**
 * Class Event
 *
 * @package McMatters\GitlabApi\Resources\User
 */
class Event extends UserResource
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
     * @see https://gitlab.com/help/api/events.md#get-user-contribution-events
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('users/:id/events', $id))
            ->json();
    }
}
