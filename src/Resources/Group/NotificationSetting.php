<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;
use McMatters\GitlabApi\Resources\Traits\NotificationSettingTrait;

/**
 * Class NotificationSetting
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class NotificationSetting extends GroupResource
{
    use NotificationSettingTrait;
}
