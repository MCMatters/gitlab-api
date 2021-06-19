<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;
use McMatters\GitlabApi\Resources\Traits\ContainerRegistryTrait;

/**
 * Class ContainerRegistry
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class ContainerRegistry extends GroupResource
{
    use ContainerRegistryTrait;
}
