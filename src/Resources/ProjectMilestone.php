<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\MilestoneApiTrait;

/**
 * Class ProjectMilestone
 *
 * @package McMatters\GitlabApi\Resources
 */
class ProjectMilestone extends AbstractResource
{
    use MilestoneApiTrait;
}
