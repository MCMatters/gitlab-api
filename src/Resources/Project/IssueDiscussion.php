<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\DiscussionTrait;

/**
 * Class IssueDiscussion
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class IssueDiscussion extends ProjectResource
{
    use DiscussionTrait;

    /**
     * @var string
     */
    protected $type = 'issues';
}
