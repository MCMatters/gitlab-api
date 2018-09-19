<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\VariableTrait;

/**
 * Class ProjectVariable
 *
 * @package McMatters\GitlabApi\Resources
 */
class ProjectVariable extends AbstractResource
{
    use VariableTrait;

    /**
     * @var string
     */
    protected $type = 'projects';
}
