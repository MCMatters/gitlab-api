<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class ReleaseLink
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class ReleaseLink extends ProjectResource
{
    /**
     * @param int|string $id
     * @param string $tagName
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/releases/links.md#get-links
     */
    public function list($id, string $tagName, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                'projects/:id/releases/:tag_name/assets/links',
                [$id, $tagName]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $tagName
     * @param int $linkId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/releases/links.md#get-a-link
     */
    public function get($id, string $tagName, int $linkId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/releases/:tag_name/assets/links/:link_id',
                [$id, $tagName, $linkId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $tagName
     * @param string $name
     * @param string $url
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/releases/links.md#create-a-link
     */
    public function create(
        $id,
        string $tagName,
        string $name,
        string $url
    ): array {
        return $this->httpClient
            ->withJson(['name' => $name, 'url' => $url])
            ->post($this->encodeUrl(
                'projects/:id/releases/:tag_name/assets/links',
                [$id, $tagName]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $tagName
     * @param int $linkId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/releases/links.md#update-a-link
     */
    public function update(
        $id,
        string $tagName,
        int $linkId,
        array $data
    ): array {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl(
                'projects/:id/releases/:tag_name/assets/links/:link_id',
                [$id, $tagName, $linkId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $tagName
     * @param int $linkId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/releases/links.md#delete-a-link
     */
    public function delete($id, string $tagName, int $linkId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/releases/:tag_name/assets/links/:link_id',
                [$id, $tagName, $linkId]
            ))
            ->getStatusCode();
    }
}
