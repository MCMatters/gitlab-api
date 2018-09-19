<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class NotificationSetting
 *
 * @package McMatters\GitlabApi\Resources
 */
class NotificationSetting extends AbstractResource
{
    /**
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getGlobal(): array
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
     */
    public function updateGlobal(array $data): array
    {
        return $this->httpClient
            ->put('notification_settings', ['query' => $data])
            ->json();
    }

    /**
     * @param int|string $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getForProject($id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('projects/{id}/notification_settings', $id))
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
     */
    public function updateForProject($id, array $data): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl('projects/{id}/notification_settings', $id),
                ['json' => $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getForGroup($id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('groups/{id}/notification_settings', $id))
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
     */
    public function updateGroup($id, array $data): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl('groups/{id}/notification_settings', $id),
                ['json' => $data]
            )
            ->json();
    }
}
