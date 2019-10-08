<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Enumerators;

/**
 * Interface JobScope
 *
 * @package McMatters\GitlabApi\Enumerators
 */
interface JobScope
{
    public const CREATED = 'created';
    public const PENDING = 'pending';
    public const RUNNING = 'running';
    public const FAILED = 'failed';
    public const SUCCESS = 'success';
    public const CANCELED = 'canceled';
    public const SKIPPED = 'skipped';
    public const MANUAL = 'manual';
}
