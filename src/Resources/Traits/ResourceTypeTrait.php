<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits;

use McMatters\GitlabApi\Helpers\StringHelper;
use function strlen, strrpos, substr;

/**
 * Trait ResourceTypeTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait ResourceTypeTrait
{
    /**
     * @param string $cut
     *
     * @return string
     */
    protected function getResourceType(string $cut = ''): string
    {
        $type = substr(static::class, strrpos(static::class, '\\') + 1);

        if ('' !== $cut) {
            $type = substr($type, 0, -strlen($cut));
        }

        return StringHelper::snake($type);
    }
}
