<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Enumerators;

/**
 * Interface Visibility
 *
 * @package McMatters\GitlabApi\Enumerators
 */
interface Visibility
{
    const PUBLIC = 'public';
    const INTERNAL = 'internal';
    const PRIVATE = 'private';
}
