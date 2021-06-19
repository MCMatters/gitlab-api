<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\AwardEmojiTrait;

/**
 * Class MergeRequestAwardEmoji
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class MergeRequestAwardEmoji extends ProjectResource
{
    use AwardEmojiTrait;

    /**
     * @var string
     */
    protected $type = 'merge_requests';
}
