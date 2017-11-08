<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Webhooks;

use InvalidArgumentException;

/**
 * Class MergeRequestWebhook
 *
 * @package McMatters\GitlabApi\Webhooks
 */
class MergeRequestWebhook extends AbstractWebhook
{
    /**
     * @return int
     * @throws InvalidArgumentException
     */
    public function getIid(): int
    {
        return (int) $this->getObjectAttributeValue('iid');
    }

    /**
     * @return int
     * @throws InvalidArgumentException
     */
    public function getProjectId(): int
    {
        return (int) $this->getObjectAttributeValue('target_project_id');
    }

    /**
     * @return string
     * @throws InvalidArgumentException
     */
    public function getUserName(): string
    {
        return $this->getObjectValue('user.username');
    }
}
