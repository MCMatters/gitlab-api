<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Exceptions;

use Exception;

/**
 * Class UnsupportedWebhook
 *
 * @package McMatters\GitlabApi\Exceptions
 */
class UnsupportedWebhook extends Exception
{
    /**
     * UnsupportedWebhook constructor.
     *
     * @param string $type
     */
    public function __construct(string $type)
    {
        parent::__construct("Unsupported webhook {$type}.");
    }
}
