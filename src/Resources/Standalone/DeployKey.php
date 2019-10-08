<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class DeployKey
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class DeployKey extends StandaloneResource
{
    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/deploy_keys.md#list-all-deploy-keys
     */
    public function list(array $query = []): array
    {
        return $this->httpClient->withQuery($query)->get('deploy_keys')->json();
    }
}
