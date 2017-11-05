<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\{
    InvalidDateException, RequestException, ResponseException
};
use function array_filter, array_merge;

/**
 * Class Event
 *
 * @package McMatters\GitlabApi\Resources
 */
class Event extends AbstractResource
{
    /**
     * @param array $filters
     * @param array $sorting
     *
     * @return array
     * @throws InvalidDateException
     * @throws RequestException
     * @throws ResponseException
     */
    public function list(array $filters = [], array $sorting = []): array
    {
        return $this->requestGet(
            'events',
            $this->transformData(array_merge($filters, $sorting))
        );
    }

    /**
     * @param int|string $id
     * @param array $filters
     * @param array $sorting
     *
     * @return array
     * @throws InvalidDateException
     * @throws RequestException
     * @throws ResponseException
     */
    public function userList(
        $id,
        array $filters = [],
        array $sorting = []
    ): array {
        return $this->requestGet(
            "users/{$this->encode($id)}/events",
            $this->transformData(array_merge($filters, $sorting))
        );
    }

    /**
     * @param int|string $id
     * @param array $filters
     * @param array $sorting
     *
     * @return array
     * @throws InvalidDateException
     * @throws RequestException
     * @throws ResponseException
     */
    public function projectList(
        $id,
        array $filters = [],
        array $sorting = []
    ): array {
        return $this->requestGet(
            "{$this->encode($id)}/events",
            $this->transformData(array_merge($filters, $sorting))
        );
    }

    /**
     * @param array $data
     *
     * @return array
     * @throws InvalidDateException
     */
    protected function transformData(array $data = []): array
    {
        foreach (['before', 'after'] as $key) {
            if (!empty($data[$key])) {
                $data[$key] = $this->transformDate($data[$key], 'Y-m-d');
            }
        }

        return array_filter($data);
    }
}
