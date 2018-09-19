<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\DiscussionTrait;

/**
 * Class SnippetDiscussion
 *
 * @package McMatters\GitlabApi\Resources
 */
class SnippetDiscussion extends AbstractResource
{
    use DiscussionTrait;

    /**
     * @var string
     */
    protected $type = 'snippets';
}
