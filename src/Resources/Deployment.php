<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const null;

/**
 * Class Deployment
 *
 * @package McMatters\GitlabApi\Resources
 */
class Deployment extends AbstractResource
{
    /**
     * @param int|string $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list($id): array
    {
        return $this->requestGet($this->getUrl($id));
    }

    /**
     * @param int|string $id
     * @param int $deploymentId
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get($id, int $deploymentId): array
    {
        return $this->requestGet($this->getUrl($id, $deploymentId));
    }

    /**
     * @param int|string $id
     * @param int|null $deploymentId
     *
     * @return string
     */
    protected function getUrl($id, int $deploymentId = null): string
    {
        $url = "projects/{$this->encode($id)}/deployments";

        return $deploymentId ? "{$url}/{$deploymentId}" : $url;
    }
}
