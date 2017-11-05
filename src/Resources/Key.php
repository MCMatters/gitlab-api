<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;

/**
 * Class Key
 *
 * @package McMatters\GitlabApi\Resources
 */
class Key extends AbstractResource
{
    /**
     * @param int $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get(int $id): array
    {
        return $this->requestGet("keys/{$id}");
    }
}
