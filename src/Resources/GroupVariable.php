<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\VariableApiTrait;

/**
 * Class GroupVariable
 *
 * @package McMatters\GitlabApi\Resources
 */
class GroupVariable extends AbstractResource
{
    use VariableApiTrait;
}
