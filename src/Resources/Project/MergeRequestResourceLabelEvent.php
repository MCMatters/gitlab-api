<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\ResourceLabelEventTrait;

/**
 * Class MergeRequestResourceLabelEvent
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class MergeRequestResourceLabelEvent extends ProjectResource
{
    use ResourceLabelEventTrait;

    /**
     * @var string
     */
    protected $type = 'merge_requests';
}
