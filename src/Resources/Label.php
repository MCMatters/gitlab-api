<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use InvalidArgumentException;
use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const null;
use function array_filter;

/**
 * Class Label
 *
 * @package McMatters\GitlabApi\Resources
 */
class Label extends AbstractResource
{
    /**
     * @param int|string $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list($id): array
    {
        return $this->requestGet($this->getUrl($id));
    }

    /**
     * @param int|string $id
     * @param string $name
     * @param string $color
     * @param string $description
     * @param int|null $priority
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create(
        $id,
        string $name,
        string $color,
        string $description = '',
        int $priority = null
    ): array {
        return $this->requestPost(
            $this->getUrl($id),
            [
                'name'        => $name,
                'color'       => $color,
                'description' => $description,
                'priority'    => $priority,
            ]
        );
    }

    /**
     * @param int|string $id
     * @param string $name
     * @param array $data
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws RequestException
     * @throws ResponseException
     */
    public function update($id, string $name, array $data): array
    {
        $data = array_filter($data);

        if (empty($data['new_name']) && empty($data['color'])) {
            throw new InvalidArgumentException(
                '"new_name" or "color" must be provided.'
            );
        }

        $data['name'] = $name;

        return $this->requestPut($this->getUrl($id), $data);
    }

    /**
     * @param int|string $id
     * @param string $name
     *
     * @return int
     * @throws RequestException
     */
    public function delete($id, string $name): int
    {
        return $this->requestDelete($this->getUrl($id), ['name' => $name]);
    }

    /**
     * @param int|string $id
     * @param int|string $labelId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function subscribe($id, $labelId): array
    {
        return $this->requestPost("{$this->getUrl($id, $labelId)}/subscribe");
    }

    /**
     * @param int|string $id
     * @param int|string $labelId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function unsubscribe($id, $labelId): array
    {
        return $this->requestPost("{$this->getUrl($id, $labelId)}/unsubscribe");
    }

    /**
     * @param int|string $id
     * @param int|string|null $labelId
     *
     * @return string
     */
    protected function getUrl($id, $labelId = null): string
    {
        $url = "projects/{$this->encode($id)}/labels";

        return null !== $labelId ? "{$url}/{$this->encode($labelId)}" : $url;
    }
}
