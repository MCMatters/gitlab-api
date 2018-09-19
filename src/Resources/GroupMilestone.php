<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\MilestoneTrait;

/**
 * Class GroupMilestone
 *
 * @package McMatters\GitlabApi\Resources
 */
class GroupMilestone extends AbstractResource
{
    use MilestoneTrait;

    /**
     * @var string
     */
    protected $type = 'groups';
}
