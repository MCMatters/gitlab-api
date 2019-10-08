<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits;

/**
 * Class NotificationSettingTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait NotificationSettingTrait
{
    /**
     * @param int|string $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/notification_settings.md#update-global-notification-settings
     */
    public function list($id): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(':type/:id/notification_settings'),
                [$this->type, $id]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/notification_settings.md#update-groupproject-level-notification-settings
     */
    public function update($id, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl(
                ':type/:id/notification_settings',
                [$this->type, $id]
            ))
            ->json();
    }
}
