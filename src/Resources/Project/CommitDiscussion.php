<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\DiscussionTrait;

/**
 * Class CommitDiscussion
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class CommitDiscussion extends ProjectResource
{
    use DiscussionTrait;

    /**
     * @var string
     */
    protected $type = 'commits';
}
