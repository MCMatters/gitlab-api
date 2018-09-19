<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\AwardEmojiTrait;

/**
 * Class IssueAwardEmoji
 *
 * @package McMatters\GitlabApi\Resources
 */
class IssueAwardEmoji extends AbstractResource
{
    use AwardEmojiTrait;

    /**
     * @var string
     */
    protected $type = 'issues';
}
