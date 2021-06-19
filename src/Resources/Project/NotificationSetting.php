<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\NotificationSettingTrait;

/**
 * Class NotificationSetting
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class NotificationSetting extends ProjectResource
{
    use NotificationSettingTrait;
}
