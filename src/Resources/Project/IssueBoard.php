<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\IssueBoardTrait;

/**
 * Class IssueBoard
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class IssueBoard extends ProjectResource
{
    use IssueBoardTrait;
}
