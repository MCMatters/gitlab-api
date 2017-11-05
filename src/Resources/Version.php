<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;

/**
 * Class Version
 *
 * @package McMatters\GitlabApi\Resources
 */
class Version extends AbstractResource
{
    /**
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get(): array
    {
        return $this->requestGet('version');
    }
}
