<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Enumerators;

/**
 * Interface EventAction
 *
 * @package McMatters\GitlabApi\Enumerators
 */
interface EventAction
{
    const CREATED = 'created';
    const UPDATED = 'updated';
    const CLOSED = 'closed';
    const REOPENED = 'reopened';
    const PUSHED = 'pushed';
    const COMMENTED = 'commented';
    const MERGED = 'merged';
    const JOINED = 'joined';
    const LEFT = 'left';
    const DESTROYED = 'destroyed';
    const EXPIRED = 'expired';
}
