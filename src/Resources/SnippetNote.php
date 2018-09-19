<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\NoteTrait;

/**
 * Class SnippetNote
 *
 * @package McMatters\GitlabApi\Resources
 */
class SnippetNote extends AbstractResource
{
    use NoteTrait;

    /**
     * @var string
     */
    protected $type = 'snippets';
}
