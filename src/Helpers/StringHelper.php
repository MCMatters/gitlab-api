<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Helpers;

use const false, true;
use function preg_replace, strpos, strtolower, str_replace, ucwords;

/**
 * Class StringHelper
 *
 * @package McMatters\GitlabApi\Helpers
 */
class StringHelper
{
    /**
     * @param string $value
     * @param string $delimiter
     *
     * @return mixed
     */
    public static function pascal(string $value, string $delimiter = '_'): string
    {
        return str_replace($delimiter, '', ucwords($value, $delimiter));
    }

    /**
     * @param string $value
     * @param string $delimiter
     *
     * @return string
     */
    public static function snake(string $value, string $delimiter = '_'): string
    {
        return strtolower(
            preg_replace('/(.)(?=[A-Z])/u', '$1'.$delimiter, $value)
        );
    }

    /**
     * @param string $value
     * @param string|array $needle
     *
     * @return bool
     */
    public static function startsWith(string $value, $needle): bool
    {
        foreach ((array) $needle as $item) {
            if (strpos($value, $item) === 0) {
                return true;
            }
        }

        return false;
    }
}
