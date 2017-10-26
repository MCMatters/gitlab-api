<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use InvalidArgumentException;
use const null, true;
use function array_filter, in_array, is_bool, is_numeric, is_string;

class FeatureFlag extends AbstractResource
{
    public function list()
    {
        return $this->requestGet('features');
    }

    public function updateOrCreate(string $name, $value, string $group = null, string $user = null)
    {
        $value = $this->transformValue($value);

        return $this->requestPost(
            "features/{$name}",
            array_filter([
                'value' => $value,
                'group' => $group,
                'user'  => $user,
            ])
        );
    }

    protected function transformValue($value)
    {
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        if (is_numeric($value)) {
            return $value;
        }

        if (is_string($value) && in_array($value, ['true', 'false'], true)) {
            return $value;
        }

        throw new InvalidArgumentException('$value must be "true", "false" or numeric');
    }
}
