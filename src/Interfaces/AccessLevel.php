<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Interfaces;

/**
 * Interface AccessLevel
 *
 * @package McMatters\GitlabApi\Interfaces
 */
interface AccessLevel
{
    const GUEST = 10;
    const REPORTER = 20;
    const DEVELOPER = 30;
    const MASTER = 40;
    const OWNER = 50;
}
