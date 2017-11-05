<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use InvalidArgumentException;
use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const null, true;
use function array_filter, in_array, is_bool, is_numeric, is_string;

/**
 * Class FeatureFlag
 *
 * @package McMatters\GitlabApi\Resources
 */
class FeatureFlag extends AbstractResource
{
    /**
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list(): array
    {
        return $this->requestGet($this->getUrl());
    }

    /**
     * @param string $name
     * @param bool|string|int $value
     * @param string|null $group
     * @param string|null $user
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws RequestException
     * @throws ResponseException
     */
    public function updateOrCreate(
        string $name,
        $value,
        string $group = null,
        string $user = null
    ): array {
        $value = $this->transformValue($value);

        return $this->requestPost(
            $this->getUrl($name),
            array_filter([
                'value' => $value,
                'group' => $group,
                'user'  => $user,
            ])
        );
    }

    /**
     * @param bool|string|int $value
     *
     * @return string|int
     * @throws InvalidArgumentException
     */
    protected function transformValue($value)
    {
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        if (is_numeric($value)) {
            return (int) $value;
        }

        if (is_string($value) && in_array($value, ['true', 'false'], true)) {
            return $value;
        }

        throw new InvalidArgumentException(
            '$value must be "true", "false" or numeric'
        );
    }

    /**
     * @param string|null $name
     *
     * @return string
     */
    protected function getUrl(string $name = null): string
    {
        return null !== $name ? "features/{$name}" : 'features';
    }
}
