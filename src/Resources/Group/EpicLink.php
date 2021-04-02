<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class EpicLink
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class EpicLink extends GroupResource
{
    use HasAllTrait;

    /**
     * @param int|string $id
     * @param int $iid
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/epic_links.md#list-epics-related-to-a-given-epic
     */
    public function list($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('groups/:id/epics/:epic_iid/epics', [$id, $iid]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param array $query
     *
     * @return array
     */
    public function all($id, int $iid, array $query = []): array
    {
        return $this->fetchAllResources('list', [$id, $iid, $query]);
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $childEpicId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/epic_links.md#assign-a-child-epic
     */
    public function assignChild($id, int $iid, int $childEpicId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'groups/:id/epics/:epic_iid/epics',
                [$id, $iid, $childEpicId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param string $title
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/epic_links.md#create-and-assign-a-child-epic
     */
    public function createAndAssignChild($id, int $iid, string $title): array
    {
        return $this->httpClient
            ->withJson(['title' => $title])
            ->post($this->encodeUrl('groups/:id/epics/:epic_iid/epics', [$id, $iid]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $childEpicId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/epic_links.md#re-order-a-child-epic
     */
    public function reorderChild(
        $id,
        int $iid,
        int $childEpicId,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl(
                'groups/:id/epics/:epic_iid/epics/:child_epic_id',
                [$id, $iid, $childEpicId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $childEpicId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/epic_links.md#unassign-a-child-epic
     */
    public function unassignChild($id, int $iid, int $childEpicId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'groups/:id/epics/:epic_iid/epics/:child_epic_id',
                [$id, $iid, $childEpicId]
            ))
            ->getStatusCode();
    }
}
