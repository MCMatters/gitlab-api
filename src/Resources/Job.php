<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class Job
 *
 * @package McMatters\GitlabApi\Resources
 */
class Job extends AbstractResource
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
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/jobs', $id),
                ['query' => $query]
            )
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
     */
    public function pipelineList($id, int $pipelineId, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/pipelines/{pipelineId}/jobs',
                    [$id, $pipelineId]
                ),
                ['query' => $query]
            )
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
     */
    public function get($id, int $jobId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('projects/{id}/jobs/{jobId}', [$id, $jobId]))
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
     */
    public function artifacts($id, int $jobId): string
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/jobs/{jobId}/artifacts',
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
     */
    public function downloadArtifactsArchive(
        $id,
        string $ref,
        string $job
    ): string {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/jobs/artifacts/{ref}/download',
                    [$id, $ref]
                ),
                ['query' => ['job' => $job]]
            )
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
     */
    public function downloadArtifactFile($id, int $jobId, string $path): string
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/jobs/{jobId}/artifacts/{path}',
                [$id, $jobId, $path]
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
     */
    public function getTrace($id, int $jobId): string
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/jobs/{jobId}/trace',
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
     */
    public function cancel($id, int $jobId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/jobs/{jobId}/cancel',
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
     */
    public function retry($id, int $jobId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/jobs/{jobId}/retry',
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
     */
    public function erase($id, int $jobId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/jobs/{jobId}/erase',
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
     */
    public function keepArtifacts($id, int $jobId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/jobs/{jobId}/artifacts/keep',
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
     */
    public function play($id, int $jobId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/jobs/{jobId}/play',
                [$id, $jobId]
            ))
            ->json();
    }
}
