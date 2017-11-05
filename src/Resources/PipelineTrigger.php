<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const null;
use function array_filter;

/**
 * Class PipelineTrigger
 *
 * @package McMatters\GitlabApi\Resources
 */
class PipelineTrigger extends AbstractResource
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
     * @param int $triggerId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get($id, int $triggerId): array
    {
        return $this->requestGet($this->getUrl($id, $triggerId));
    }

    /**
     * @param int|string $id
     * @param string $description
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create($id, string $description): array
    {
        return $this->requestPost(
            $this->getUrl($id),
            ['description' => $description]
        );
    }

    /**
     * @param int|string $id
     * @param int $triggerId
     * @param string|null $description
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function update(
        $id,
        int $triggerId,
        string $description = null
    ): array {
        return $this->requestPut(
            $this->getUrl($id, $triggerId),
            array_filter(['description' => $description])
        );
    }

    /**
     * @param int|string $id
     * @param int $triggerId
     *
     * @return int
     * @throws RequestException
     */
    public function delete($id, int $triggerId): int
    {
        return $this->requestDelete($this->getUrl($id, $triggerId));
    }

    /**
     * @param int|string $id
     * @param int $triggerId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function takeOwnership($id, int $triggerId): array
    {
        return $this->requestPost("{$this->getUrl($id, $triggerId)}/take_ownership");
    }

    /**
     * @param int|string $id
     * @param int|null $triggerId
     *
     * @return string
     */
    protected function getUrl($id, int $triggerId = null): string
    {
        $url = "projects/{$this->encode($id)}/triggers";

        return null !== $triggerId ? "{$url}/{$triggerId}" : $url;
    }
}
