<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\AwardEmojiTrait;

/**
 * Class SnippetAwardEmoji
 *
 * @package McMatters\GitlabApi\Resources
 */
class SnippetAwardEmoji extends AbstractResource
{
    use AwardEmojiTrait;

    /**
     * @var string
     */
    protected $type = 'snippets';
}
