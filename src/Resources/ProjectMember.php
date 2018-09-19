<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\MemberTrait;

/**
 * Class ProjectMember
 *
 * @package McMatters\GitlabApi\Resources
 */
class ProjectMember extends AbstractResource
{
    use MemberTrait;

    /**
     * @var string
     */
    protected $type = 'projects';
}
