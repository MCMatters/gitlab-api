<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Enumerators;

/**
 * Interface ImportStatus
 *
 * @package McMatters\GitlabApi\Enumerators
 *
 * @see https://gitlab.com/help/api/project_import_export.md#import-status
 */
interface ImportStatus
{
    public const NONE = 'none';
    public const SCHEDULED = 'scheduled';
    public const FAILED = 'failed';
    public const STARTED = 'started';
    public const FINISHED = 'finished';
}
