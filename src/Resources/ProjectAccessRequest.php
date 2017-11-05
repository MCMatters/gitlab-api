<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\AccessRequestApiTrait;

/**
 * Class ProjectAccessRequest
 *
 * @package McMatters\GitlabApi\Resources
 */
class ProjectAccessRequest extends AbstractResource
{
    use AccessRequestApiTrait;
}
