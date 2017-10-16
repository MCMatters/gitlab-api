<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Exceptions;

use InvalidArgumentException;

/**
 * Class BadResourceException
 *
 * @package McMatters\GitlabApi\Exceptions
 */
class BadResourceException extends InvalidArgumentException
{
    /**
     * BadResourceException constructor.
     */
    public function __construct()
    {
        parent::__construct('Bad resource passed.');
    }
}
