<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;
use McMatters\GitlabApi\Resources\Traits\LabelTrait;

/**
 * Class Label
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class Label extends GroupResource
{
    use LabelTrait;
}
