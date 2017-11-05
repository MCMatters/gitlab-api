<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;

/**
 * Class Repository
 *
 * @package McMatters\GitlabApi\Resources
 */
class Repository extends AbstractResource
{
    /**
     * @param int|string $id
     * @param array $filters
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function listTree($id, array $filters = []): array
    {
        return $this->requestGet("{$this->getUrl($id)}/tree", $filters);
    }

    /**
     * @param int|string $id
     * @param string $sha
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function blob($id, string $sha): array
    {
        // todo: https://gitlab.com/gitlab-org/gitlab-ce/issues/26561
        return $this->requestGet("{$this->getUrl($id)}/blobs/{$sha}");
    }

    /**
     * @param int|string $id
     * @param string $sha
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function rawBlob($id, string $sha): array
    {
        // todo: https://gitlab.com/gitlab-org/gitlab-ce/issues/26561
        return $this->requestGet("{$this->getUrl($id)}/blobs/{$sha}/raw");
    }

    /**
     * @param int|string $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function archive($id): array
    {
        return $this->requestGet("{$this->getUrl($id)}/archive");
    }

    /**
     * @param int|string $id
     * @param string $from
     * @param string $to
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function compare($id, string $from, string $to): array
    {
        return $this->requestGet(
            "{$this->getUrl($id)}/compare",
            ['from' => $from, 'to' => $to]
        );
    }

    /**
     * @param int|string $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function contributors($id): array
    {
        return $this->requestGet("{$this->getUrl($id)}/contributors");
    }

    /**
     * @param int|string $id
     *
     * @return string
     */
    protected function getUrl($id): string
    {
        return "projects/{$this->encode($id)}/repository";
    }
}
