<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Webhooks;

class WikiPageWebhook extends AbstractWebhook
{
    public function getProjectId()
    {
        return $this->getObjectValue('project.path_with_namespace');
    }
}
