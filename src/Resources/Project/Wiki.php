<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class Wiki
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Wiki extends ProjectResource
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
     * @see https://gitlab.com/help/api/wikis.md#list-wiki-pages
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/wikis', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $slug
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/wikis.md#get-a-wiki-page
     */
    public function get($id, string $slug): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('projects/:id/wikis/:slug', [$id, $slug]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $title
     * @param string $content
     * @param string $format
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/wikis.md#create-a-new-wiki-page
     */
    public function create(
        $id,
        string $title,
        string $content,
        string $format = 'markdown'
    ): array {
        return $this->httpClient
            ->withJson([
                'title' => $title,
                'content' => $content,
                'format' => $format,
            ])
            ->post($this->encodeUrl('projects/:id/wikis', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $slug
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/wikis.md#edit-an-existing-wiki-page
     */
    public function update(
        $id,
        string $slug,
        array $data
    ): array {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl('projects/:id/wikis/:slug', [$id, $slug]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $slug
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/wikis.md#delete-a-wiki-page
     */
    public function delete($id, string $slug): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl('projects/:id/wikis/:slug', [$id, $slug]))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param string $file
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/wikis.md#upload-an-attachment-to-the-wiki-repository
     */
    public function uploadAttachment($id, string $file, array $data = []): array
    {
        $formData = [];

        foreach (['file' => $file] + $data as $key => $value) {
            $formData[] = ['name' => $key, 'contents' => $value];
        }

        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/:id/wikis/attachments', $id),
                ['form' => $formData]
            )
            ->json();
    }
}
