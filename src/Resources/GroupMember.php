<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\MemberApiTrait;

/**
 * Class GroupMember
 *
 * @package McMatters\GitlabApi\Resources
 */
class GroupMember extends AbstractResource
{
    use MemberApiTrait;
}
