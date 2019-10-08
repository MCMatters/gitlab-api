<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;
use McMatters\GitlabApi\Resources\Traits\CustomAttributesTrait;

/**
 * Class CustomAttribute
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class CustomAttribute extends GroupResource
{
    use CustomAttributesTrait;
}
