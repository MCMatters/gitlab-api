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
    public const PUBLIC = 'public';
    public const INTERNAL = 'internal';
    public const PRIVATE = 'private';
}
