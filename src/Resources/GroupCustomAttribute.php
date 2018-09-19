<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\CustomAttributesTrait;

/**
 * Class GroupCustomAttribute
 *
 * @package McMatters\GitlabApi\Resources
 */
class GroupCustomAttribute extends AbstractResource
{
    use CustomAttributesTrait;

    /**
     * @var string
     */
    protected $type = 'groups';
}
