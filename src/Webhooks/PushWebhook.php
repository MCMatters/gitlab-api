<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Webhooks;

use InvalidArgumentException;
use function is_array;

/**
 * Class PushWebhook
 *
 * @package McMatters\GitlabApi\Webhooks
 */
class PushWebhook extends AbstractWebhook
{
    /**
     * @return string
     * @throws InvalidArgumentException
     */
    public function getId(): string
    {
        return $this->getObjectValue('checkout_sha');
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
     * @return array
     */
    public function getAttributes(): array
    {
        $attributes = [];

        foreach ($this->payload as $key => $item) {
            if (is_array($item)) {
                continue;
            }

            $attributes[$key] = $item;
        }

        return $attributes;
    }
}