<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class Pipeline
 *
 * @package McMatters\GitlabApi\Resources
 */
class Pipeline extends AbstractResource
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
                $this->encodeUrl('projects/{id}/pipelines', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $pipelineId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get($id, int $pipelineId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/pipelines/{pipelineId}',
                [$id, $pipelineId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $ref
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create($id, string $ref, array $data = []): array
    {
        return  $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/pipeline', $id),
                ['json' => ['ref' => $ref] + $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $pipelineId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function retryJobs($id, int $pipelineId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/pipelines/{pipelineId}/retry',
                [$id, $pipelineId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $pipelineId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function cancelJobs($id, int $pipelineId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/{id}/pipelines/{pipelineId}/cancel',
                [$id, $pipelineId]
            ))
            ->json();
    }
}
