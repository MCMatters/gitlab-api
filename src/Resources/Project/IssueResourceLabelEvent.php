<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\ResourceLabelEventTrait;

/**
 * Class IssueResourceLabelEvent
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class IssueResourceLabelEvent extends ProjectResource
{
    use ResourceLabelEventTrait;

    /**
     * @var string
     */
    protected $type = 'issues';
}
