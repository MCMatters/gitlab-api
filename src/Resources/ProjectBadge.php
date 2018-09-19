<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\BadgeTrait;

/**
 * Class ProjectBadge
 *
 * @package McMatters\GitlabApi\Resources
 */
class ProjectBadge extends AbstractResource
{
    use BadgeTrait;

    /**
     * @var string
     */
    protected $type = 'projects';
}
