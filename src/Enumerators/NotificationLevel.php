<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Enumerators;

/**
 * Interface NotificationLevel
 *
 * @package McMatters\GitlabApi\Enumerators
 */
interface NotificationLevel
{
    const DISABLED = 'disabled';
    const PARTICIPATING = 'participating';
    const WATCH = 'watch';
    const GLOBAL = 'global';
    const MENTION = 'mention';
    const CUSTOM = 'custom';
}
