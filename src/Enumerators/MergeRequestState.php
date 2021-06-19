<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Enumerators;

/**
 * Interface MergeRequestState
 *
 * @package McMatters\GitlabApi\Enumerators
 */
interface MergeRequestState
{
    public const OPENED = 'opened';
    public const CLOSED = 'closed';
    public const LOCKED = 'locked';
    public const MERGED = 'merged';
    public const ALL = 'all';
}
