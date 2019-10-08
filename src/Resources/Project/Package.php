<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class Package
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Package extends ProjectResource
{
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
     * @see https://gitlab.com/help/api/packages.md#list-project-packages
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/packages', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $packageId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/packages.md#get-a-project-package
     */
    public function get($id, int $packageId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/packages/:package_id',
                [$id, $packageId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $packageId
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/packages.md#list-package-files
     */
    public function files($id, int $packageId, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                'projects/:id/packages/:package_id/package_files',
                [$id, $packageId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $packageId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/packages.md#delete-a-project-package
     */
    public function delete($id, int $packageId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/packages/:package_id',
                [$id, $packageId]
            ))
            ->getStatusCode();
    }
}
