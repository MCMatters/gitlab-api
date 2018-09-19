<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class SidekiqMetric
 *
 * @package McMatters\GitlabApi\Resources
 */
class SidekiqMetric extends AbstractResource
{
    /**
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function queueMetrics(): array
    {
        return $this->httpClient->get('sidekiq/queue_metrics')->json();
    }

    /**
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function processMetrics(): array
    {
        return $this->httpClient->get('sidekiq/process_metrics')->json();
    }

    /**
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function jobStatistics(): array
    {
        return $this->httpClient->get('sidekiq/job_stats')->json();
    }

    /**
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function compoundMetrics(): array
    {
        return $this->httpClient->get('sidekiq/compound_metrics')->json();
    }
}
