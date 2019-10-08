<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Helpers;

use Throwable;

use function array_key_exists, explode, is_callable, strpos;

use const false, null;

/**
 * Class ArrayHelper
 *
 * @package McMatters\GitlabApi\Helpers
 */
class ArrayHelper
{
    /**
     * @param array $array
     * @param string $key
     * @param mixed $default
     *
     * @return mixed
     */
    public static function get(array $array, string $key, $default = null)
    {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }

        $value = $array;

        try {
            if (strpos($key, '.') === false) {
                $value = $array[$key];
            } else {
                foreach (explode('.', $key) as $segment) {
                    $value = $value[$segment];
                }
            }
        } catch (Throwable $e) {
            return is_callable($default) ? $default() : $default;
        }

        return $value;
    }
}
