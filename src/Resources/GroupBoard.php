<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\IssueBoardTrait;

/**
 * Class GroupBoard
 *
 * @package McMatters\GitlabApi\Resources
 */
class GroupBoard extends AbstractResource
{
    use IssueBoardTrait;

    /**
     * @var string
     */
    protected $type = 'groups';
}
