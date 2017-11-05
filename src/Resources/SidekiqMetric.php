<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;

/**
 * Class SidekiqMetric
 *
 * @package McMatters\GitlabApi\Resources
 */
class SidekiqMetric extends AbstractResource
{
    /**
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function queueMetrics(): array
    {
        return $this->requestGet('sidekiq/queue_metrics');
    }

    /**
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function processMetrics(): array
    {
        return $this->requestGet('sidekiq/process_metrics');
    }

    /**
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function compoundMetrics(): array
    {
        return $this->requestGet('sidekiq/compound_metrics');
    }

    /**
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function jobStatistics(): array
    {
        return $this->requestGet('sidekiq/job_stats');
    }
}
