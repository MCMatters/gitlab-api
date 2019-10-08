<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Enumerators;

/**
 * Interface EmailEvent
 *
 * @package McMatters\GitlabApi\Enumerators
 */
interface EmailEvent
{
    public const NEW_NOTE = 'new_note';
    public const NEW_ISSUE = 'new_issue';
    public const REOPEN_ISSUE = 'reopen_issue';
    public const CLOSE_ISSUE = 'close_issue';
    public const REASSIGN_ISSUE = 'reassign_issue';
    public const NEW_MERGE_REQUEST = 'new_merge_request';
    public const PUSH_TO_MERGE_REQUEST = 'push_to_merge_request';
    public const REOPEN_MERGE_REQUEST = 'reopen_merge_request';
    public const CLOSE_MERGE_REQUEST = 'close_merge_request';
    public const REASSIGN_MERGE_REQUEST = 'reassign_merge_request';
    public const MERGE_MERGE_REQUEST = 'merge_merge_request';
    public const FAILED_PIPELINE = 'failed_pipeline';
    public const SUCCESS_PIPELINE = 'success_pipeline';
    public const NEW_EPIC = 'new_epic';
}
