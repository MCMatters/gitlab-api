<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Enumerators;

/**
 * Interface AccessLevel
 *
 * @package McMatters\GitlabApi\Enumerators
 */
interface AccessLevel
{
    const GUEST = 10;
    const REPORTER = 20;
    const DEVELOPER = 30;
    const MASTER = 40;
    const OWNER = 50;
}
