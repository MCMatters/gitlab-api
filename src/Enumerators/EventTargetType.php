<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Interface EventTargetType
 *
 * @package McMatters\GitlabApi\Resources
 */
interface EventTargetType
{
    const ISSUE = 'issue';
    const MILESTONE = 'milestone';
    const MERGE_REQUEST = 'merge_request';
    const NOTE = 'note';
    const PROJECT = 'project';
    const SNIPPET = 'snippet';
    const USER = 'user';
}
