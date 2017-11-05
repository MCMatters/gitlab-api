<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\NoteApiTrait;

/**
 * Class SnippetNote
 *
 * @package McMatters\GitlabApi\Resources
 */
class SnippetNote extends AbstractResource
{
    use NoteApiTrait;
}
