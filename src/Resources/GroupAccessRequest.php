<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\AccessRequestApiTrait;

/**
 * Class GroupAccessRequest
 *
 * @package McMatters\GitlabApi\Resources
 */
class GroupAccessRequest extends AbstractResource
{
    use AccessRequestApiTrait;
}
