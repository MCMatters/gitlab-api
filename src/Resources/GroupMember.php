<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\MemberTrait;

/**
 * Class GroupMember
 *
 * @package McMatters\GitlabApi\Resources
 */
class GroupMember extends AbstractResource
{
    use MemberTrait;

    /**
     * @var string
     */
    protected $type = 'groups';
}
