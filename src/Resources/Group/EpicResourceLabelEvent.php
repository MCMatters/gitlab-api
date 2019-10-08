<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;
use McMatters\GitlabApi\Resources\Traits\ResourceLabelEventTrait;

/**
 * Class EpicResourceLabelEvent
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class EpicResourceLabelEvent extends GroupResource
{
    use ResourceLabelEventTrait;

    /**
     * @var string
     */
    protected $type = 'epics';
}
