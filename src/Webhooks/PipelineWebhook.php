<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Webhooks;

use InvalidArgumentException;

/**
 * Class PipelineWebhook
 *
 * @package McMatters\GitlabApi\Webhooks
 */
class PipelineWebhook extends AbstractWebhook
{
    /**
     * @return string
     * @throws InvalidArgumentException
     */
    public function getProjectId(): string
    {
        return $this->getObjectValue('project.path_with_namespace');
    }
}
