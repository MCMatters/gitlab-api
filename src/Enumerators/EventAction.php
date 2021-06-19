<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Enumerators;

/**
 * Interface EventAction
 *
 * @package McMatters\GitlabApi\Enumerators
 */
interface EventAction
{
    public const CREATED = 'created';
    public const UPDATED = 'updated';
    public const CLOSED = 'closed';
    public const REOPENED = 'reopened';
    public const PUSHED = 'pushed';
    public const COMMENTED = 'commented';
    public const MERGED = 'merged';
    public const JOINED = 'joined';
    public const LEFT = 'left';
    public const DESTROYED = 'destroyed';
    public const EXPIRED = 'expired';
}
