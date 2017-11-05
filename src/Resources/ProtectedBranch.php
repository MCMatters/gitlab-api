<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use McMatters\GitlabApi\Interfaces\AccessLevel;
use const null;

/**
 * Class ProtectedBranch
 *
 * @package McMatters\GitlabApi\Resources
 */
class ProtectedBranch extends AbstractResource
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
     * @param array $accessLevels
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function protect(
        $id,
        string $name,
        array $accessLevels = [
            'push'  => AccessLevel::MASTER,
            'merge' => AccessLevel::MASTER,
        ]
    ): array {
        return $this->requestPost(
            $this->getUrl($id),
            [
                'name'               => $name,
                'push_access_level'  => $accessLevels['push'] ?? AccessLevel::MASTER,
                'merge_access_level' => $accessLevels['merge'] ?? AccessLevel::MASTER,
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
    public function unprotect($id, string $name): int
    {
        return $this->requestDelete($this->getUrl($id, $name));
    }

    /**
     * @param int|string $id
     * @param string|null $name
     *
     * @return string
     */
    protected function getUrl($id, string $name = null): string
    {
        $url = "projects/{$this->encode($id)}/protected_branches";

        return null !== $name ? "{$url}/{$this->encode($name)}" : $url;
    }
}
