<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class Tag
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Tag extends ProjectResource
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
     * @see https://gitlab.com/help/api/tags.md#list-project-repository-tags
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/repository/tags', $id))
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
     * @param string $tagName
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/tags.md#get-a-single-repository-tag
     */
    public function get($id, string $tagName): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/repository/tags/:tag_name',
                [$id, $tagName]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $tagName
     * @param string $ref
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/tags.md#create-a-new-tag
     */
    public function create(
        $id,
        string $tagName,
        string $ref,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson(['tag_name' => $tagName, 'ref' => $ref] + $data)
            ->post($this->encodeUrl('projects/:id/repository/tags', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $tagName
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/tags.md#delete-a-tag
     */
    public function delete($id, string $tagName): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/repository/tags/:tag_name',
                [$id, $tagName]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param string $tagName
     * @param string $description
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/tags.md#create-a-new-release
     */
    public function createRelease(
        $id,
        string $tagName,
        string $description
    ): array {
        return $this->httpClient
            ->withJson(['description' => $description])
            ->post($this->encodeUrl(
                'projects/:id/repository/tags/:tag_name/release',
                [$id, $tagName]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $tagName
     * @param string $description
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/tags.md#update-a-release
     */
    public function updateRelease(
        $id,
        string $tagName,
        string $description
    ): array {
        return $this->httpClient
            ->withJson(['description' => $description])
            ->put($this->encodeUrl(
                'projects/:id/repository/tags/:tag_name/release',
                [$id, $tagName]
            ))
            ->json();
    }
}
