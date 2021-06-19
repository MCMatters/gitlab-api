<?php

declare(strict_types=1);

namespace McMatters\GitlabApi;

use InvalidArgumentException;
use McMatters\GitlabApi\Exceptions\UnsupportedWebhook;
use McMatters\GitlabApi\Helpers\StringHelper;
use McMatters\GitlabApi\Webhooks\Webhook;
use stdClass;

use function class_exists, gettype, is_a, is_array, is_string, json_decode;

use const true;

/**
 * Class GitlabWebhook
 *
 * @package McMatters\GitlabApi
 */
class GitlabWebhook
{
    /**
     * @param mixed $payload
     *
     * @return \McMatters\GitlabApi\Webhooks\Webhook
     *
     * @throws \McMatters\GitlabApi\Exceptions\UnsupportedWebhook
     * @throws \InvalidArgumentException
     */
    public static function make($payload): Webhook
    {
        $payload = self::transformPayload($payload);

        self::checkObjectKind($payload);

        $class = self::getClass($payload);

        return new $class($payload);
    }

    /**
     * @param mixed $payload
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     */
    protected static function transformPayload($payload): array
    {
        if (is_string($payload)) {
            $payload = json_decode($payload, true);
        } elseif (is_a($payload, stdClass::class)) {
            $payload = (array) $payload;
        }

        if (!is_array($payload)) {
            $type = gettype($payload);

            throw new InvalidArgumentException(
                "Payload must be array, string or stdClass. {$type} given."
            );
        }

        return $payload;
    }

    /**
     * @param array $payload
     *
     * @return string
     *
     * @throws \McMatters\GitlabApi\Exceptions\UnsupportedWebhook
     */
    protected static function getClass(array $payload): string
    {
        $kind = StringHelper::pascal($payload['object_kind']);
        $class = __NAMESPACE__.'\\Webhooks\\'."{$kind}Webhook";

        if (!class_exists($class)) {
            throw new UnsupportedWebhook($payload['object_kind']);
        }

        return $class;
    }

    /**
     * @param array $payload
     *
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    protected static function checkObjectKind(array $payload): void
    {
        if (empty($payload['object_kind'])) {
            throw new InvalidArgumentException('There is no key "object_kind"');
        }
    }
}
