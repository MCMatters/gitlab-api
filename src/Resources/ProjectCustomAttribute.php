<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\CustomAttributesTrait;

/**
 * Class ProjectCustomAttribute
 *
 * @package McMatters\GitlabApi\Resources
 */
class ProjectCustomAttribute extends AbstractResource
{
    use CustomAttributesTrait;

    /**
     * @var string
     */
    protected $type = 'projects';
}
