<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\MilestoneTrait;

/**
 * Class ProjectMilestone
 *
 * @package McMatters\GitlabApi\Resources
 */
class ProjectMilestone extends AbstractResource
{
    use MilestoneTrait;

    /**
     * @var string
     */
    protected $type = 'projects';
}
