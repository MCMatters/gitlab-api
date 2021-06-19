<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;
use McMatters\GitlabApi\Resources\Traits\AccessRequestTrait;

/**
 * Class AccessRequest
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class AccessRequest extends GroupResource
{
    use AccessRequestTrait;
}
