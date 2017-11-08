<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Webhooks;

use InvalidArgumentException;

/**
 * Class IssueWebhook
 *
 * @package McMatters\GitlabApi\Webhooks
 */
class IssueWebhook extends AbstractWebhook
{
    /**
     * @return int
     * @throws InvalidArgumentException
     */
    public function getProjectId(): int
    {
        return (int) $this->getObjectAttributeValue('project_id');
    }

    /**
     * @return bool
     * @throws InvalidArgumentException
     */
    public function isConfidential(): bool
    {
        return (bool) $this->getObjectAttributeValue('confidential');
    }
}
