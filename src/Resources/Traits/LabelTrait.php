<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits;

use function is_numeric;

/**
 * Class LabelTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait LabelTrait
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
     * @see https://gitlab.com/help/api/labels.md#labels-api
     * @see https://gitlab.com/help/api/group_labels.md#list-group-labels
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(':type/:id/labels', [$this->type, $id]))
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
     * @param string $name
     * @param string $color
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/labels.md#create-a-new-label
     * @see https://gitlab.com/help/api/group_labels.md#create-a-new-group-label
     */
    public function create(
        $id,
        string $name,
        string $color,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson(['name' => $name, 'color' => $color] + $data)
            ->post($this->encodeUrl(':type/:id/labels', [$this->type, $id]))
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
     *
     * @see https://gitlab.com/help/api/labels.md#edit-an-existing-label
     * @see https://gitlab.com/help/api/group_labels.md#update-a-group-label
     */
    public function update($id, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl(':type/:id/labels', [$this->type, $id]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int|string $labelId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/labels.md#delete-a-label
     * @see https://gitlab.com/help/api/group_labels.md#delete-a-group-label
     */
    public function delete($id, $labelId): int
    {
        return $this->httpClient
            ->withQuery($this->getLabelKeyMap($labelId))
            ->delete($this->encodeUrl(':type/:id/labels', [$this->type, $id]))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int|string $labelId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/labels.md#subscribe-to-a-label
     * @see https://gitlab.com/help/api/group_labels.md#subscribe-to-a-group-label
     */
    public function subscribe($id, $labelId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                ':type/:id/labels/:label_id/subscribe',
                [$this->type, $id, $labelId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int|string $labelId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/labels.md#unsubscribe-from-a-label
     * @see https://gitlab.com/help/api/group_labels.md#unsubscribe-from-a-group-label
     */
    public function unsubscribe($id, $labelId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                ':type/:id/labels/:label_id/unsubscribe',
                [$this->type, $id, $labelId]
            ))
            ->json();
    }

    /**
     * @param int|string $labelId
     *
     * @return array
     */
    protected function getLabelKeyMap($labelId): array
    {
        return is_numeric($labelId)
            ? ['label_id' => $labelId]
            : ['name' => $labelId];
    }
}
