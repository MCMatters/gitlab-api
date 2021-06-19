<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\NoteTrait;

/**
 * Class IssueNote
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class IssueNote extends ProjectResource
{
    use NoteTrait;

    /**
     * @var string
     */
    protected $type = 'issues';
}
