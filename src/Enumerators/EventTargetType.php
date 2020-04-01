<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Enumerators;

/**
 * Interface EventTargetType
 *
 * @package McMatters\GitlabApi\Resources
 */
interface EventTargetType
{
    public const ISSUE = 'issue';
    public const MILESTONE = 'milestone';
    public const MERGE_REQUEST = 'merge_request';
    public const NOTE = 'note';
    public const PROJECT = 'project';
    public const SNIPPET = 'snippet';
    public const USER = 'user';
}
