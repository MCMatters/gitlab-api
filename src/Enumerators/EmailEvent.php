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
    const NEW_NOTE = 'new_note';
    const NEW_ISSUE = 'new_issue';
    const REOPEN_ISSUE = 'reopen_issue';
    const CLOSE_ISSUE = 'close_issue';
    const REASSIGN_ISSUE = 'reassign_issue';
    const NEW_MERGE_REQUEST = 'new_merge_request';
    const REOPEN_MERGE_REQUEST = 'reopen_merge_request';
    const CLOSE_MERGE_REQUEST = 'close_merge_request';
    const REASSIGN_MERGE_REQUEST = 'reassign_merge_request';
    const MERGE_MERGE_REQUEST = 'merge_merge_request';
    const FAILED_PIPELINE = 'failed_pipeline';
    const SUCCESS_PIPELINE = 'success_pipeline';
}
