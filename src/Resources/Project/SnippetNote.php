<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\NoteTrait;

/**
 * Class SnippetNote
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class SnippetNote extends ProjectResource
{
    use NoteTrait;

    /**
     * @var string
     */
    protected $type = 'snippets';
}
