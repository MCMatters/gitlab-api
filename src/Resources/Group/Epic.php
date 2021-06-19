<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class Epic
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class Epic extends GroupResource
{
    use HasAllTrait;

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
     * @see https://gitlab.com/help/api/epics.md#list-epics-for-a-group
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('groups/:id/epics', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param array $query
     *
     * @return array
     */
    public function all($id, array $query = []): array
    {
        return $this->fetchAllResources('list', [$id, $query]);
    }

    /**
     * @param int|string $id
     * @param int|string $iid
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/epics.md#single-epic
     */
    public function get($id, $iid): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('groups/:id/epics/:epic_iid', [$id, $iid]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $title
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/epics.md#new-epic
     */
    public function create($id, string $title, array $data = []): array
    {
        return $this->httpClient
            ->withJson(['title' => $title] + $data)
            ->post($this->encodeUrl('groups/:id/epics', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int|string $iid
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/epics.md#update-epic
     */
    public function update($id, $iid, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl('groups/:id/epics/:epic_iid', [$id, $iid]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int|string $iid
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/epics.md#delete-epic
     */
    public function delete($id, $iid): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl('groups/:id/epics/:epic_iid', [$id, $iid]))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int|string $iid
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/epics.md#create-a-todo
     */
    public function createTodo($id, $iid): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'groups/:id/epics/:epic_iid/todo',
                [$id, $iid]
            ))
            ->json();
    }
}
