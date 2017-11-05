<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;

/**
 * Class NotificationSetting
 *
 * @package McMatters\GitlabApi\Resources
 */
class NotificationSetting extends AbstractResource
{
    /**
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function getGlobal(): array
    {
        return $this->requestGet($this->getUrl());
    }

    /**
     * @param array $data
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function updateGlobal(array $data = []): array
    {
        return $this->requestPut($this->getUrl(), $data);
    }

    /**
     * @param int|string $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function getProject($id): array
    {
        return $this->requestGet($this->getUrl('project', $id));
    }

    /**
     * @param int|string $id
     * @param array $data
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function updateProject($id, array $data = []): array
    {
        return $this->requestPut($this->getUrl('project', $id), $data);
    }

    /**
     * @param int|string $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function getGroup($id): array
    {
        return $this->requestGet($this->getUrl('group', $id));
    }

    /**
     * @param int|string $id
     * @param array $data
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function updateGroup($id, array $data = []): array
    {
        return $this->requestPut($this->getUrl('group', $id), $data);
    }

    /**
     * @param string|null $type
     * @param int|string|null $id
     *
     * @return string
     */
    protected function getUrl(string $type = null, $id = null): string
    {
        if (null !== $type && null !== $id) {
            return "{$type}s/{$this->encode($id)}/notification_settings";
        }

        return 'notification_settings';
    }
}
