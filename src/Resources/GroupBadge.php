<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\BadgeTrait;

/**
 * Class GroupBadge
 *
 * @package McMatters\GitlabApi\Resources
 */
class GroupBadge extends AbstractResource
{
    use BadgeTrait;

    /**
     * @var string
     */
    protected $type = 'groups';
}
