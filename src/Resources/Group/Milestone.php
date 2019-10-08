<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;
use McMatters\GitlabApi\Resources\Traits\MilestoneTrait;

/**
 * Class Milestone
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class Milestone extends GroupResource
{
    use MilestoneTrait;
}
