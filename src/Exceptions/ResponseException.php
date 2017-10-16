<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Exceptions;

use Exception;

/**
 * Class ResponseException
 *
 * @package McMatters\GitlabApi\Exceptions
 */
class ResponseException extends Exception
{
    /**
     * ResponseException constructor.
     *
     * @param string $message
     */
    public function __construct(string $message = '')
    {
        parent::__construct($message);
    }
}
