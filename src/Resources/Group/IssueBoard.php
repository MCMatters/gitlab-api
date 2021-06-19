<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;
use McMatters\GitlabApi\Resources\Traits\IssueBoardTrait;

/**
 * Class IssueBoard
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class IssueBoard extends GroupResource
{
    use IssueBoardTrait;
}
