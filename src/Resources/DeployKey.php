<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const false;
use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;

/**
 * Class DeployKey
 *
 * @package McMatters\GitlabApi\Resources
 */
class DeployKey extends AbstractResource
{
    /**
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list(): array
    {
        return $this->requestGet('deploy_keys');
    }

    /**
     * @param int|string $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function projectList($id): array
    {
        return $this->requestGet($this->getUrl($id));
    }

    /**
     * @param int|string $id
     * @param int $keyId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get($id, int $keyId): array
    {
        return $this->requestGet($this->getUrl($id, $keyId));
    }

    /**
     * @param int|string $id
     * @param string $title
     * @param string $key
     * @param bool $canPush
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create(
        $id,
        string $title,
        string $key,
        bool $canPush = false
    ): array {
        return $this->requestPost(
            $this->getUrl($id),
            [
                'title'    => $title,
                'key'      => $key,
                'can_push' => $canPush,
            ]
        );
    }

    /**
     * @param int|string $id
     * @param int $keyId
     *
     * @return int
     * @throws RequestException
     */
    public function delete($id, int $keyId): int
    {
        return $this->requestDelete($this->getUrl($id, $keyId));
    }

    /**
     * @param int|string $id
     * @param int $keyId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function enable($id, int $keyId): array
    {
        return $this->requestPost("{$this->getUrl($id, $keyId)}/enable");
    }

    /**
     * @param int|string $id
     * @param int|null $keyId
     *
     * @return string
     */
    protected function getUrl($id, int $keyId = null): string
    {
        $url = "projects/{$this->encode($id)}/deploy_keys";

        return null !== $keyId ? "{$url}/{$keyId}" : $url;
    }
}
