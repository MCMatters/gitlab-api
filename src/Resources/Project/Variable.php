<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\VariableTrait;

/**
 * Class Variable
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Variable extends ProjectResource
{
    use VariableTrait;
}
