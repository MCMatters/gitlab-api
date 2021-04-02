<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits;

/**
 * Class ResourceLabelEventTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait ResourceLabelEventTrait
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
     * @see https://gitlab.com/help/api/resource_label_events.md#list-project-issue-label-events
     * @see https://gitlab.com/help/api/resource_label_events.md#list-group-epic-label-events
     * @see https://gitlab.com/help/api/resource_label_events.md#list-project-merge-request-label-events
     */
    public function list($id, int $iid, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                ':base_type/:id/:type/:iid/resource_label_events',
                [$this->baseType, $id, $this->type, $iid]
            ))
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
     * @param int $resourceLabelEventId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/resource_label_events.md#get-single-issue-label-event
     * @see https://gitlab.com/help/api/resource_label_events.md#get-single-epic-label-event
     * @see https://gitlab.com/help/api/resource_label_events.md#get-single-merge-request-label-event
     */
    public function get($id, int $iid, int $resourceLabelEventId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                ':base_type/:id/:type/:iid/resource_label_events/:resource_label_event_id',
                [$this->baseType, $id, $this->type, $iid, $resourceLabelEventId]
            ))
            ->json();
    }
}
