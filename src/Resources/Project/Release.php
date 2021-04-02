<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class Release
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Release extends ProjectResource
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
     * @see https://gitlab.com/help/api/releases/index.md#list-releases
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/releases', $id))
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
     * @see https://gitlab.com/help/api/releases/index.md#get-a-release-by-a-tag-name
     */
    public function get($id, string $tagName): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/releases/:tag_name',
                [$id, $tagName]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $name
     * @param string $tagName
     * @param string $description
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/releases/index.md#create-a-release
     */
    public function create(
        $id,
        string $name,
        string $tagName,
        string $description,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson([
                    'name' => $name,
                    'tag_name' => $tagName,
                    'description' => $description,
                ] + $data
            )
            ->post($this->encodeUrl('projects/:id/releases', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $tagName
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/releases/index.md#update-a-release
     */
    public function update($id, string $tagName, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl(
                'projects/:id/releases/:tag_name',
                [$id, $tagName]
            )
            )
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
     * @see https://gitlab.com/help/api/releases/index.md#delete-a-release
     */
    public function delete($id, string $tagName): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/releases/:tag_name',
                [$id, $tagName]
            ))
            ->getStatusCode();
    }
}
