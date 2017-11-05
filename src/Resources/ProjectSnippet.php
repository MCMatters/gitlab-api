<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use McMatters\GitlabApi\Interfaces\Visibility;
use const null;

/**
 * Class ProjectSnippet
 *
 * @package McMatters\GitlabApi\Resources
 */
class ProjectSnippet extends AbstractResource
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
     * @param int $snippetId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get($id, int $snippetId): array
    {
        return $this->requestGet($this->getUrl($id, $snippetId));
    }

    /**
     * @param int|string $id
     * @param string $title
     * @param string $code
     * @param string $fileName
     * @param string $visibility
     * @param string|null $description
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create(
        $id,
        string $title,
        string $code,
        string $fileName,
        string $visibility = Visibility::PUBLIC,
        string $description = null
    ): array {
        return $this->requestPost(
            $this->getUrl($id),
            [
                'title'       => $title,
                'code'        => $code,
                'file_name'   => $fileName,
                'visibility'  => $visibility,
                'description' => $description,
            ]
        );
    }

    /**
     * @param int|string $id
     * @param int $snippetId
     * @param array $data
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function update($id, int $snippetId, array $data = []): array
    {
        return $this->requestPut($this->getUrl($id, $snippetId), $data);
    }

    /**
     * @param int|string $id
     * @param int $snippetId
     *
     * @return int
     * @throws RequestException
     */
    public function delete($id, int $snippetId): int
    {
        return $this->requestDelete($this->getUrl($id, $snippetId));
    }

    /**
     * @param int|string $id
     * @param int $snippetId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function rawContent($id, int $snippetId): array
    {
        return $this->requestGet("{$this->getUrl($id, $snippetId)}/raw");
    }

    /**
     * @param int|string $id
     * @param int $snippetId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function userAgentDetails($id, int $snippetId): array
    {
        return $this->requestGet("{$this->getUrl($id, $snippetId)}/user_agent_detail");
    }

    /**
     * @param int|string $id
     * @param int|null $snippetId
     *
     * @return string
     */
    protected function getUrl($id, int $snippetId = null): string
    {
        $url = "projects/{$this->encode($id)}/snippets";

        return null !== $snippetId ? "{$url}/{$snippetId}" : $url;
    }
}
