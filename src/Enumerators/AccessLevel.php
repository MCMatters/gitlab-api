<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Enumerators;

/**
 * Interface AccessLevel
 *
 * @package McMatters\GitlabApi\Enumerators
 */
interface AccessLevel
{
    public const GUEST = 10;
    public const REPORTER = 20;
    public const DEVELOPER = 30;
    public const MASTER = 40;
    public const OWNER = 50;
    public const ADMIN = 60;
}
