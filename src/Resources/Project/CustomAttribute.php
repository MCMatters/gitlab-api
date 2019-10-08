<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\CustomAttributesTrait;

/**
 * Class CustomAttribute
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class CustomAttribute extends ProjectResource
{
    use CustomAttributesTrait;
}
