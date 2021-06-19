<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Webhooks;

/**
 * Class PipelineWebhook
 *
 * @package McMatters\GitlabApi\Webhooks
 */
class PipelineWebhook extends Webhook
{
    /**
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function getProjectId(): string
    {
        return $this->getObjectValue('project.path_with_namespace');
    }
}
