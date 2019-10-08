<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;
use McMatters\GitlabApi\Resources\Traits\BadgeTrait;

/**
 * Class Badge
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class Badge extends GroupResource
{
    use BadgeTrait;
}
