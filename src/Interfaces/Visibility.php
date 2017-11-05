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
    const PUBLIC = 'public';
    const INTERNAL = 'internal';
    const PRIVATE = 'private';
}
