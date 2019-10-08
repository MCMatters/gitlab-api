<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;
use McMatters\GitlabApi\Resources\Traits\VariableTrait;

/**
 * Class Variable
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class Variable extends GroupResource
{
    use VariableTrait;
}
