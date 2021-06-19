<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Webhooks;

/**
 * Class WikiPageWebhook
 *
 * @package McMatters\GitlabApi\Webhooks
 */
class WikiPageWebhook extends Webhook
{
    public const ACTION_CREATE = 'create';
    public const ACTION_UPDATE = 'update';
    public const ACTION_DELETE = 'delete';

    /**
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function getProjectId(): string
    {
        return $this->getObjectValue('project.path_with_namespace');
    }

    /**
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function getUserName(): string
    {
        return $this->getObjectValue('user.username');
    }

    /**
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function getSlug(): string
    {
        return $this->getObjectAttributeValue('slug');
    }

    /**
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function getTitle(): string
    {
        return $this->getObjectAttributeValue('title');
    }

    /**
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function getFormat(): string
    {
        return $this->getObjectAttributeValue('format');
    }

    /**
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function getUrl(): string
    {
        return $this->getObjectAttributeValue('url');
    }

    /**
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function getAction(): string
    {
        return $this->getObjectAttributeValue('action');
    }
}
