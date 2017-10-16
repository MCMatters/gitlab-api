<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits;

use function is_array, is_numeric, urlencode;

/**
 * Trait EncodingDataTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait EncodingDataTrait
{
    /**
     * @param array|int|string $content
     *
     * @return array|int|string
     */
    protected function encode($content)
    {
        return is_array($content)
            ? $this->encodeArray($content)
            : $this->encodeItem($content);
    }

    /**
     * @param int|string $content
     *
     * @return int|string
     */
    protected function encodeItem($content)
    {
        return is_numeric($content) ? $content : urlencode($content);
    }

    /**
     * @param array $content
     *
     * @return array
     */
    protected function encodeArray(array $content): array
    {
        $encoded = [];

        foreach ($content as $item) {
            $encoded[] = $this->encodeItem($item);
        }

        return $encoded;
    }
}
