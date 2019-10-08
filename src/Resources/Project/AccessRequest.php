<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\AccessRequestTrait;

/**
 * Class AccessRequest
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class AccessRequest extends ProjectResource
{
    use AccessRequestTrait;
}
