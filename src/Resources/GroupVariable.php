<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\VariableTrait;

/**
 * Class GroupVariable
 *
 * @package McMatters\GitlabApi\Resources
 */
class GroupVariable extends AbstractResource
{
    use VariableTrait;

    /**
     * @var string
     */
    protected $type = 'groups';
}
