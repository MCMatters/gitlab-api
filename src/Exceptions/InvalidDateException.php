<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Exceptions;

use InvalidArgumentException;

/**
 * Class InvalidDateException
 *
 * @package McMatters\GitlabApi\Exceptions
 */
class InvalidDateException extends InvalidArgumentException
{
    /**
     * InvalidDateException constructor.
     */
    public function __construct()
    {
        parent::__construct('Invalid date passed.');
    }
}
