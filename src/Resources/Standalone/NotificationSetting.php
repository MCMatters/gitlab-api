<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class NotificationSetting
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class NotificationSetting extends StandaloneResource
{
    /**
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/notification_settings.md#global-notification-settings
     */
    public function list(): array
    {
        return $this->httpClient->get('notification_settings')->json();
    }

    /**
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/notification_settings.md#update-global-notification-settings
     */
    public function update(array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put('notification_settings')
            ->json();
    }
}
