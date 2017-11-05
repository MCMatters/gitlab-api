<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\NoteApiTrait;

/**
 * Class MergeRequestNote
 *
 * @package McMatters\GitlabApi\Resources
 */
class MergeRequestNote extends AbstractResource
{
    use NoteApiTrait;
}
