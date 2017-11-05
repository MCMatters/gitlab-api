<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const false, null, true;
use function array_merge;

/**
 * Class Pipeline
 *
 * @package McMatters\GitlabApi\Resources
 */
class Pipeline extends AbstractResource
{
    /**
     * @param int|string $id
     * @param array $filters
     * @param array $sorting
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list(
        $id,
        array $filters = [],
        array $sorting = []
    ): array {
        return $this->requestGet(
            $this->getUrl($id),
            array_merge($filters, $sorting)
        );
    }

    /**
     * @param int|string $id
     * @param int $pipelineId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get($id, int $pipelineId): array
    {
        return $this->requestGet($this->getUrl($id, $pipelineId));
    }

    /**
     * @param int|string $id
     * @param string $ref
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create($id, string $ref): array
    {
        return $this->requestPost(
            $this->getUrl($id, null, true),
            ['ref' => $ref]
        );
    }

    /**
     * @param int|string $id
     * @param int $pipelineId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function retryJobs($id, int $pipelineId): array
    {
        return $this->requestPost("{$this->getUrl($id, $pipelineId)}/retry");
    }

    /**
     * @param int|string $id
     * @param int $pipelineId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function cancelJobs($id, int $pipelineId): array
    {
        return $this->requestPost("{$this->getUrl($id, $pipelineId)}/cancel");
    }

    /**
     * @param int|string $id
     * @param int|null $pipelineId
     * @param bool $singular
     *
     * @return string
     */
    protected function getUrl(
        $id,
        int $pipelineId = null,
        bool $singular = false
    ): string {
        $url = "projects/{$this->encode($id)}/pipeline";
        $url .= $singular ? '' : 's';

        return null !== $url ? "{$url}/{$pipelineId}" : $url;
    }
}
