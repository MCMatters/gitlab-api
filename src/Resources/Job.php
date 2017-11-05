<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const false, null;

/**
 * Class Job
 *
 * @package McMatters\GitlabApi\Resources
 */
class Job extends AbstractResource
{
    /**
     * @param int|string $id
     * @param string|array $scope
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list($id, $scope = ''): array
    {
        return $this->requestGet($this->getUrl($id), ['scope' => $scope]);
    }

    /**
     * @param int|string $id
     * @param int $pipelineId
     * @param string|array $scope
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function pipelineList($id, int $pipelineId, $scope = ''): array
    {
        return $this->requestGet(
            "projects/{$this->encode($id)}/pipelines/{$pipelineId}/jobs",
            ['scope' => $scope]
        );
    }

    /**
     * @param int|string $id
     * @param int $jobId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get($id, int $jobId): array
    {
        return $this->requestGet($this->getUrl($id, $jobId));
    }

    /**
     * @param int|string $id
     * @param int $jobId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function cancel($id, int $jobId): array
    {
        return $this->requestPost("{$this->getUrl($id, $jobId)}/cancel");
    }

    /**
     * @param int|string $id
     * @param int $jobId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function retry($id, int $jobId): array
    {
        return $this->requestPost("{$this->getUrl($id, $jobId)}/retry");
    }

    /**
     * @param int|string $id
     * @param int $jobId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function erase($id, int $jobId): array
    {
        return $this->requestPost("{$this->getUrl($id, $jobId)}/erase");
    }

    /**
     * @param int|string $id
     * @param int $jobId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function play($id, int $jobId): array
    {
        return $this->requestPost("{$this->getUrl($id, $jobId)}/play");
    }

    /**
     * @param int|string $id
     * @param int $jobId
     *
     * @return array|bool
     * @throws ResponseException
     */
    public function artifacts($id, int $jobId)
    {
        try {
            return $this->requestGet("{$this->getUrl($id, $jobId)}/artifacts");
        } catch (RequestException $e) {
            return false;
        }
    }

    /**
     * @param int|string $id
     * @param int $jobId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function keepArtifacts($id, int $jobId): array
    {
        return $this->requestPost("{$this->getUrl($id, $jobId)}/artifacts/keep");
    }

    /**
     * @param int|string $id
     * @param string $ref
     * @param string $job
     *
     * @return array|bool
     * @throws ResponseException
     */
    public function downloadArtifactsArchive($id, string $ref, string $job)
    {
        try {
            return $this->requestGet(
                "{$this->getUrl($id)}/artifacts/{$ref}/download",
                ['job' => $job]
            );
        } catch (RequestException $e) {
            return false;
        }
    }

    /**
     * @param int|string $id
     * @param int $jobId
     * @param string $path
     *
     * @return array|bool
     * @throws ResponseException
     */
    public function downloadArtifactFile($id, int $jobId, string $path)
    {
        try {
            return $this->requestGet(
                "{$this->getUrl($id, $jobId)}/artifacts/{$this->encode($path)}"
            );
        } catch (RequestException $e) {
            return false;
        }
    }

    /**
     * @param int|string $id
     * @param int $jobId
     *
     * @return array|bool
     * @throws ResponseException
     */
    public function traceFile($id, int $jobId)
    {
        try {
            return $this->requestGet("{$this->getUrl($id, $jobId)}/trace");
        } catch (RequestException $e) {
            return false;
        }
    }

    /**
     * @param int|string $id
     * @param int|null $jobId
     *
     * @return string
     */
    protected function getUrl($id, int $jobId = null): string
    {
        $url = "projects/{$this->encode($id)}/jobs";

        return null !== $jobId ? "{$url}/{$jobId}" : $url;
    }
}
