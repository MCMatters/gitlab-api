<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;
use McMatters\GitlabApi\Resources\Traits\NoteTrait;

/**
 * Class EpicNote
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class EpicNote extends GroupResource
{
    use NoteTrait;

    /**
     * @var string
     */
    protected $type = 'epics';
}
