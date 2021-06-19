<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class ProtectedTag
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class ProtectedTag extends ProjectResource
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
     * @see https://gitlab.com/help/api/protected_tags.md#list-protected-tags
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/protected_tags', $id))
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
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/protected_tags.md#get-a-single-protected-tag-or-wildcard-protected-tag
     */
    public function get($id, string $name): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/protected_tags/:name',
                [$id, $name]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $name
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/protected_tags.md#protect-repository-tags
     */
    public function protect($id, string $name, array $data = []): array
    {
        return $this->httpClient
            ->withJson(['name' => $name] + $data)
            ->post($this->encodeUrl('projects/:id/protected_tags', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $name
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/protected_tags.md#unprotect-repository-tags
     */
    public function unprotect($id, string $name): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/protected_tags/:name',
                [$id, $name]
            ))
            ->getStatusCode();
    }
}
