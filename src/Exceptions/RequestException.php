<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Exceptions;

use Exception;
use Throwable;

/**
 * Class RequestException
 *
 * @package McMatters\GitlabApi\Exceptions
 */
class RequestException extends Exception
{
    /**
     * RequestException constructor.
     *
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(
        string $message = '',
        int $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
