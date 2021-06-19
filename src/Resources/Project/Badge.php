<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\BadgeTrait;

/**
 * Class Badge
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Badge extends ProjectResource
{
    use BadgeTrait;
}
