<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Webhooks;

use BadMethodCallException;
use InvalidArgumentException;
use McMatters\GitlabApi\Helpers\ArrayHelper;
use McMatters\GitlabApi\Helpers\StringHelper;

use function substr;

/**
 * Class Webhook
 *
 * @package McMatters\GitlabApi\Webhooks
 */
abstract class Webhook
{
    /**
     * @var array
     */
    protected $payload;

    /**
     * Webhook constructor.
     *
     * @param array $payload
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
     *
     * @throws \InvalidArgumentException
     */
    public function getId()
    {
        return $this->getObjectAttributeValue('id');
    }

    /**
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public function getAttributes()
    {
        return $this->getObjectValue('object_attributes');
    }

    /**
     * @return int|string
     *
     * @throws \InvalidArgumentException
     */
    abstract public function getProjectId();

    /**
     * @param string $key
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public function getObjectAttributeValue(string $key)
    {
        return $this->getObjectValue("object_attributes.{$key}");
    }

    /**
     * @param string $key
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public function getObjectValue(string $key)
    {
        return ArrayHelper::get($this->payload, $key, static function () use ($key) {
            throw new InvalidArgumentException(
                "{$key} is not passed. Check your payload."
            );
        });
    }

    /**
     * @param string $name
     * @param array $arguments
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     * @throws \BadMethodCallException
     */
    public function __call(string $name, array $arguments)
    {
        if (StringHelper::startsWith($name, 'get')) {
            $key = StringHelper::snake(substr($name, 3));

            return $this->getObjectAttributeValue($key);
        }

        throw new BadMethodCallException("Method {$name} does not exist.");
    }
}
