<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class Job
 *
 * @package McMatters\GitlabApi\Resources
 */
class Job extends ProjectResource
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
     * @see https://gitlab.com/help/api/jobs.md#list-project-jobs
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/jobs', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $pipelineId
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/jobs.md#list-pipeline-jobs
     */
    public function listForPipeline(
        $id,
        int $pipelineId,
        array $query = []
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                'projects/:id/pipelines/:pipeline_id/jobs',
                [$id, $pipelineId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $jobId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/jobs.md#get-a-single-job
     */
    public function get($id, int $jobId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('projects/:id/jobs/:job_id', [$id, $jobId]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $jobId
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/jobs.md#get-job-artifacts
     */
    public function artifacts($id, int $jobId): string
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/jobs/:job_id/artifacts',
                [$id, $jobId]
            ))
            ->getBody();
    }

    /**
     * @param int|string $id
     * @param string $ref
     * @param string $job
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/jobs.md#download-the-artifacts-archive
     */
    public function downloadArtifactsArchive(
        $id,
        string $ref,
        string $job
    ): string {
        return $this->httpClient
            ->withQuery(['job' => $job])
            ->get($this->encodeUrl(
                'projects/:id/jobs/artifacts/:ref/download',
                [$id, $ref]
            ))
            ->getBody();
    }

    /**
     * @param int|string $id
     * @param int $jobId
     * @param string $path
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/jobs.md#download-a-single-artifact-file-by-job-id
     */
    public function downloadArtifactFile($id, int $jobId, string $path): string
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/jobs/:job_id/artifacts/:path',
                [$id, $jobId, $path]
            ))
            ->getBody();
    }

    /**
     * @param int|string $id
     * @param string $ref
     * @param string $path
     * @param string $job
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/jobs.md#download-a-single-artifact-file-from-specific-tag-or-branch
     */
    public function downloadArtifactFileFromSpecific(
        $id,
        string $ref,
        string $path,
        string $job
    ): string {
        return $this->httpClient
            ->withQuery(['job' => $job])
            ->get($this->encodeUrl(
                'projects/:id/jobs/artifacts/:ref_name/raw/:path',
                [$id, $ref, $path]
            ))
            ->getBody();
    }

    /**
     * @param int|string $id
     * @param int $jobId
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/jobs.md#get-a-trace-file
     */
    public function getTrace($id, int $jobId): string
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/jobs/:job_id/trace',
                [$id, $jobId]
            ))
            ->getBody();
    }

    /**
     * @param int|string $id
     * @param int $jobId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/jobs.md#cancel-a-job
     */
    public function cancel($id, int $jobId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/jobs/:job_id/cancel',
                [$id, $jobId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $jobId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/jobs.md#retry-a-job
     */
    public function retry($id, int $jobId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/jobs/:job_id/retry',
                [$id, $jobId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $jobId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/jobs.md#erase-a-job
     */
    public function erase($id, int $jobId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/jobs/:job_id/erase',
                [$id, $jobId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $jobId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/jobs.md#keep-artifacts
     */
    public function keepArtifacts($id, int $jobId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/jobs/:job_id/artifacts/keep',
                [$id, $jobId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $jobId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/jobs.md#delete-artifacts
     */
    public function deleteArtifacts($id, int $jobId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/jobs/:job_id/artifacts',
                [$id, $jobId]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int $jobId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function play($id, int $jobId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/jobs/:job_id/play',
                [$id, $jobId]
            ))
            ->json();
    }
}
