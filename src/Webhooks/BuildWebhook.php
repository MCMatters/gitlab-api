<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Webhooks;

use InvalidArgumentException;
use McMatters\GitlabApi\Helpers\StringHelper;

/**
 * Class BuildWebhook
 *
 * @package McMatters\GitlabApi\Webhooks
 */
class BuildWebhook extends AbstractWebhook
{
    /**
     * @return int
     * @throws InvalidArgumentException
     */
    public function getId(): int
    {
        return (int) $this->getObjectValue('build_id');
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        $attributes = [];

        foreach ($this->payload as $key => $value) {
            if (StringHelper::startsWith($key, 'build_')) {
                $attributes[substr($key, 6)] = $value;
            }
        }

        return $attributes;
    }

    /**
     * @return int
     * @throws InvalidArgumentException
     */
    public function getProjectId(): int
    {
        return (int) $this->getObjectValue('project_id');
    }
}
