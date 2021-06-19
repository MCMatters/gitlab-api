<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;
use McMatters\GitlabApi\Resources\Traits\MemberTrait;

/**
 * Class Member
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class Member extends GroupResource
{
    use MemberTrait;
}
