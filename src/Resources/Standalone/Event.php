<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class Event
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class Event extends StandaloneResource
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
     * @see https://gitlab.com/help/api/events.md#list-currently-authenticated-users-events
     */
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->get('events', ['query' => $query])
            ->json();
    }
}
