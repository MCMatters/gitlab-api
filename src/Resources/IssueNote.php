<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\NoteTrait;

/**
 * Class IssueNote
 *
 * @package McMatters\GitlabApi\Resources
 */
class IssueNote extends AbstractResource
{
    use NoteTrait;

    /**
     * @var string
     */
    protected $type = 'issues';
}
