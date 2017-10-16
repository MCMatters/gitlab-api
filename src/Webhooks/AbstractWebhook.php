<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Webhooks;

use InvalidArgumentException;
use McMatters\GitlabApi\Helpers\ArrayHelper;

/**
 * Class WebhookHelper
 *
 * @package McMatters\GitlabApi\Webhooks
 */
abstract class AbstractWebhook
{
    /**
     * @var array
     */
    protected $payload;

    /**
     * WebhookHelper constructor.
     *
     * @param array $payload
     *
     * @throws InvalidArgumentException
     */
    public function __construct($payload)
    {
        $this->payload = $payload;
    }

    /**
     * @return array
     */
    public function getPayload(): array
    {
        return $this->payload;
    }

    /**
     * @return int|string
     * @throws InvalidArgumentException
     */
    public function getId()
    {
        return $this->getObjectAttributeValue('id');
    }

    /**
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function getAttributes()
    {
        return $this->getObjectValue('object_attributes');
    }

    /**
     * @return int|string
     * @throws InvalidArgumentException
     */
    abstract public function getProjectId();

    /**
     * @param string $key
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function getObjectAttributeValue(string $key)
    {
        return $this->getObjectValue("object_attributes.{$key}");
    }

    /**
     * @param string $key
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function getObjectValue(string $key)
    {
        return ArrayHelper::get($this->payload, $key, function () use ($key) {
            throw new InvalidArgumentException(
                "{$key} is not passed. Check your payload."
            );
        });
    }
}
