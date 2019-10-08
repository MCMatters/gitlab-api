<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class ProjectResource
 *
 * @package McMatters\GitlabApi\Resources
 */
class ProjectResource extends Resource
{
    /**
     * @var string
     */
    protected $baseType = 'projects';

    /**
     * @var string
     */
    protected $type = 'projects';
}
