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
    const ACTION_OPEN = 'open';
    const ACTION_UPDATE = 'update';
    const ACTION_MERGE = 'merge';
    const ACTION_CLOSE = 'close';

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

    /**
     * @return string
     * @throws InvalidArgumentException
     */
    public function getAction(): string
    {
        return $this->getObjectAttributeValue('action');
    }

    /**
     * @return string
     * @throws InvalidArgumentException
     */
    public function getSourceBranch(): string
    {
        return $this->getObjectAttributeValue('source_branch');
    }

    /**
     * @return string
     * @throws InvalidArgumentException
     */
    public function getTargetBranch(): string
    {
        return $this->getObjectAttributeValue('target_branch');
    }

    /**
     * @return array
     * @throws InvalidArgumentException
     */
    public function getLastCommit(): array
    {
        return $this->getObjectAttributeValue('last_commit');
    }

    /**
     * @return string
     * @throws InvalidArgumentException
     */
    public function getLastCommitHash(): string
    {
        return $this->getObjectAttributeValue('last_commit.id');
    }
}
