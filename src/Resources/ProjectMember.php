<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\MemberApiTrait;

/**
 * Class ProjectMember
 *
 * @package McMatters\GitlabApi\Resources
 */
class ProjectMember extends AbstractResource
{
    use MemberApiTrait;
}
