<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Interfaces;

/**
 * Interface Visibility
 *
 * @package McMatters\GitlabApi\Interfaces
 */
interface Visibility
{
    const VISIBILITY_PUBLIC = 'public';
    const VISIBILITY_INTERNAL = 'internal';
    const VISIBILITY_PRIVATE = 'private';
}
