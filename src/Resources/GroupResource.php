<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class GroupResource
 *
 * @package McMatters\GitlabApi\Resources
 */
class GroupResource extends Resource
{
    /**
     * @var string
     */
    protected $baseType = 'groups';

    /**
     * @var string
     */
    protected $type = 'groups';
}
