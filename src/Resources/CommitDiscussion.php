<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\DiscussionTrait;

/**
 * Class CommitDiscussion
 *
 * @package McMatters\GitlabApi\Resources
 */
class CommitDiscussion extends AbstractResource
{
    use DiscussionTrait;
}
