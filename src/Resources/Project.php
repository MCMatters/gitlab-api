<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class Project
 *
 * @package McMatters\GitlabApi\Resources
 */
class Project extends AbstractResource
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
        return $this->httpClient->get('projects', ['query' => $query])->json();
    }

    /**
     * @param int|string $idOrUsername
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function userList($idOrUsername, array $query = []): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'users/{idOrUsername}/projects', $idOrUsername),
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
    public function get($id, array $query = []): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('projects/{id}', $id), ['query' => $query])
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
    public function users($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/users', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create(array $data): array
    {
        return $this->httpClient->post('projects', ['json' => $data])->json();
    }

    /**
     * @param int $userId
     * @param string $name
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createForUser(
        int $userId,
        string $name,
        array $data = []
    ): array {
        return $this->httpClient
            ->post(
                "projects/user/{$userId}",
                ['json' => ['name' => $name] + $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update($id, array $data): array
    {
        return $this->httpClient
            ->put($this->encodeUrl('projects/{id}', $id), ['json' => $data])
            ->json();
    }

    /**
     * @param int|string $id
     * @param int|string $namespace
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function fork($id, $namespace): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/fork', $id),
                ['json' => ['namespace' => $namespace]]
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
    public function forks($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/forks', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function star($id): array
    {
        return $this->httpClient
            ->post($this->encodeUrl('projects/{id}/star', $id))
            ->json();
    }

    /**
     * @param int|string $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function unstar($id): array
    {
        return $this->httpClient
            ->post($this->encodeUrl('projects/{id}/unstar', $id))
            ->json();
    }

    /**
     * @param int|string $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function languages($id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('projects/{id}/languages', $id))
            ->json();
    }

    /**
     * @param int|string $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function archive($id): array
    {
        return $this->httpClient
            ->post($this->encodeUrl('projects/{id}/archive', $id))
            ->json();
    }

    /**
     * @param int|string $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function unarchive($id): array
    {
        return $this->httpClient
            ->post($this->encodeUrl('projects/{id}/unarchive', $id))
            ->json();
    }

    /**
     * @param int|string $id
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function delete($id): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl('projects/{id}', $id))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param string|resource $file
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function uploadFile($id, $file): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/uploads', $id),
                ['form' => ['file' => $file]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $groupId
     * @param int $groupAccess
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function share(
        $id,
        int $groupId,
        int $groupAccess,
        array $data = []
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/share', $id),
                [
                    'json' => [
                        'group_id' => $groupId,
                        'group_access' => $groupAccess
                    ] + $data,
                ]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $groupId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function deleteSharedLinkWithinGroup($id, int $groupId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/{id}/share/{groupId}',
                [$id, $groupId]
            ))
            ->getStatusCode();
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
    public function hooks($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/hooks', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $hookId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getHook($id, int $hookId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/hooks/{hookId}',
                [$id, $hookId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $url
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createHook($id, string $url, array $data = []): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/hooks', $id),
                ['json' => ['url' => $url] + $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $hookId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function updateHook($id, int $hookId, array $data): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/{id}/hooks/{hookId}',
                    [$id, $hookId]
                ),
                ['json' => $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $hookId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function deleteHook($id, int $hookId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/{id}/hooks/{hookId}',
                [$id, $hookId]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int $forkedFromId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createForkedRelation($id, int $forkedFromId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/fork/{forkedFromId}',
                [$id, $forkedFromId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function deleteForkedRelation($id): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl('projects/{id}/fork', $id))
            ->getStatusCode();
    }

    /**
     * @param string $search
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function search(string $search, array $query = []): array
    {
        return $this->list(['search' => $search] + $query);
    }

    /**
     * @param int|string $id
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function startHousekeeping($id): string
    {
        return $this->httpClient
            ->post($this->encodeUrl('projects/{id}/housekeeping', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param $namespace
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function transfer($id, $namespace): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl('projects/{id}/transfer', $id),
                ['json' => ['namespace' => $namespace]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param array $query
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function downloadSnapshot($id, array $query = []): string
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/snapshot', $id),
                ['query' => $query]
            )
            ->getBody();
    }
}
