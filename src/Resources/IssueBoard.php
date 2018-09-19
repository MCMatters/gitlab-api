<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\IssueBoardTrait;

/**
 * Class IssueBoard
 *
 * @package McMatters\GitlabApi\Resources
 */
class IssueBoard extends AbstractResource
{
    use IssueBoardTrait;

    /**
     * @var string
     */
    protected $type = 'projects';
}
