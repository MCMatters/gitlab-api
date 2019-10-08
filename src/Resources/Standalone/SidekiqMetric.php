<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class SidekiqMetric
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class SidekiqMetric extends StandaloneResource
{
    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/sidekiq_metrics.md#get-the-current-queue-metrics
     */
    public function queueMetrics(array $query = []): array
    {
        return $this->httpClient
            ->get('sidekiq/queue_metrics', ['query' => $query])
            ->json();
    }

    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/sidekiq_metrics.md#get-the-current-process-metrics
     */
    public function processMetrics(array $query = []): array
    {
        return $this->httpClient
            ->get('sidekiq/process_metrics', ['query' => $query])
            ->json();
    }

    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/sidekiq_metrics.md#get-the-current-job-statistics
     */
    public function jobStatistics(array $query = []): array
    {
        return $this->httpClient
            ->get('sidekiq/job_stats', ['query' => $query])
            ->json();
    }

    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function compoundMetrics(array $query = []): array
    {
        return $this->httpClient
            ->get('sidekiq/compound_metrics', ['query' => $query])
            ->json();
    }
}
