<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const null;

/**
 * Class Tag
 *
 * @package McMatters\GitlabApi\Resources
 */
class Tag extends AbstractResource
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
        return $this->requestGet($this->encode($id));
    }

    /**
     * @param int|string $id
     * @param string $name
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get($id, string $name): array
    {
        return $this->requestGet($this->getUrl($id, $name));
    }

    /**
     * @param int|string $id
     * @param string $name
     * @param string $ref
     * @param string|null $message
     * @param string|null $description
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create(
        $id,
        string $name,
        string $ref,
        string $message = null,
        string $description = null
    ): array {
        return $this->requestPost(
            $this->getUrl($id),
            [
                'name'        => $name,
                'ref'         => $ref,
                'message'     => $message,
                'description' => $description,
            ]
        );
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
        return $this->requestDelete($this->getUrl($id, $name));
    }

    /**
     * @param int|string $id
     * @param string $name
     * @param string $description
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function createRelease($id, string $name, string $description): array
    {
        return $this->requestPost(
            "{$this->getUrl($id, $name)}/release",
            ['description' => $description]
        );
    }

    /**
     * @param int|string $id
     * @param string $name
     * @param string $description
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function updateRelease($id, string $name, string $description): array
    {
        return $this->requestPut(
            "{$this->getUrl($id, $name)}/release",
            ['description' => $description]
        );
    }

    /**
     * @param int|string $id
     * @param string|null $name
     *
     * @return string
     */
    protected function getUrl($id, string $name = null): string
    {
        $url = "projects/{$this->encode($id)}/repository/tags";

        return null !== $name ? "{$url}/{$this->encode($name)}" : $url;
    }
}
