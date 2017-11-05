<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\MilestoneApiTrait;

/**
 * Class GroupMilestone
 *
 * @package McMatters\GitlabApi\Resources
 */
class GroupMilestone extends AbstractResource
{
    use MilestoneApiTrait;
}
