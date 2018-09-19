<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\AwardEmojiTrait;

/**
 * Class MergeRequestAwardEmoji
 *
 * @package McMatters\GitlabApi\Resources
 */
class MergeRequestAwardEmoji extends AbstractResource
{
    use AwardEmojiTrait;

    /**
     * @var string
     */
    protected $type = 'merge_requests';
}
