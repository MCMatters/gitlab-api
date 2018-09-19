<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\CustomAttributesTrait;

/**
 * Class UserCustomAttribute
 *
 * @package McMatters\GitlabApi\Resources
 */
class UserCustomAttribute extends AbstractResource
{
    use CustomAttributesTrait;

    /**
     * @var string
     */
    protected $type = 'users';
}
