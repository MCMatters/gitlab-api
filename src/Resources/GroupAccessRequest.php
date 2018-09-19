<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\AccessRequestTrait;

/**
 * Class GroupAccessRequest
 *
 * @package McMatters\GitlabApi\Resources
 */
class GroupAccessRequest extends AbstractResource
{
    use AccessRequestTrait;

    /**
     * @var string
     */
    protected $type = 'groups';
}
