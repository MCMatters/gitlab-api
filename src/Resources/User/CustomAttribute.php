<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\User;

use McMatters\GitlabApi\Resources\Traits\CustomAttributesTrait;
use McMatters\GitlabApi\Resources\UserResource;

/**
 * Class CustomAttribute
 *
 * @package McMatters\GitlabApi\Resources\User
 */
class CustomAttribute extends UserResource
{
    use CustomAttributesTrait;
}
