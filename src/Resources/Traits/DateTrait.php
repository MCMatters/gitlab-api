<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits;

use DateTime;
use McMatters\GitlabApi\Exceptions\InvalidDateException;
use const null;
use function is_string;

/**
 * Trait DateTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait DateTrait
{
    /**
     * @param DateTime|string $date
     *
     * @return string
     * @throws InvalidDateException
     */
    protected function transformDate($date): string
    {
        if (is_string($date)) {
            $date = new DateTime($date);
        }

        if (!$date instanceof DateTime) {
            throw new InvalidDateException();
        }

        return $date->format(DateTime::ATOM);
    }

    /**
     * @param DateTime|string|null $date
     *
     * @return null|string
     * @throws InvalidDateException
     */
    protected function transformNullableDate($date)
    {
        if (null === $date) {
            return null;
        }

        return $this->transformDate($date);
    }
}
