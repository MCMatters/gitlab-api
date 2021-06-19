<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Enumerators;

/**
 * Interface NotificationLevel
 *
 * @package McMatters\GitlabApi\Enumerators
 */
interface NotificationLevel
{
    public const DISABLED = 'disabled';
    public const PARTICIPATING = 'participating';
    public const WATCH = 'watch';
    public const GLOBAL = 'global';
    public const MENTION = 'mention';
    public const CUSTOM = 'custom';
}
