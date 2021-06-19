<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;
use McMatters\GitlabApi\Resources\Traits\DiscussionTrait;

/**
 * Class EpicDiscussion
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class EpicDiscussion extends GroupResource
{
    use DiscussionTrait;

    /**
     * @var string
     */
    protected $type = 'epics';
}
