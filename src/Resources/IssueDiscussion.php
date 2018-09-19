<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\DiscussionTrait;

/**
 * Class IssueDiscussion
 *
 * @package McMatters\GitlabApi\Resources
 */
class IssueDiscussion extends AbstractResource
{
    use DiscussionTrait;

    /**
     * @var string
     */
    protected $type = 'issues';
}
