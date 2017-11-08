<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Webhooks;

use InvalidArgumentException;
use McMatters\GitlabApi\Helpers\StringHelper;

/**
 * Class NoteWebhook
 *
 * @package McMatters\GitlabApi\Webhooks
 */
class NoteWebhook extends AbstractWebhook
{
    /**
     * @return string
     * @throws InvalidArgumentException
     */
    public function getNoteableType(): string
    {
        return $this->getObjectAttributeValue('noteable_type');
    }

    /**
     * @return int
     * @throws InvalidArgumentException
     */
    public function getNoteableId(): int
    {
        return (int) $this->getObjectAttributeValue('noteable_id');
    }

    /**
     * @return array
     * @throws InvalidArgumentException
     */
    public function getNoteableModel(): array
    {
        $type = $this->getNoteableType();

        return $this->getObjectValue(StringHelper::snake($type));
    }

    /**
     * @return int
     * @throws InvalidArgumentException
     */
    public function getProjectId(): int
    {
        return (int) $this->getObjectValue('project_id');
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
