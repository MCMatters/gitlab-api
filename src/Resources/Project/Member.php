<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\MemberTrait;

/**
 * Class Member
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Member extends ProjectResource
{
    use MemberTrait;
}
