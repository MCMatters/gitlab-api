<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\AwardEmojiTrait;

/**
 * Class IssueAwardEmoji
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class IssueAwardEmoji extends ProjectResource
{
    use AwardEmojiTrait;

    /**
     * @var string
     */
    protected $type = 'issues';
}
