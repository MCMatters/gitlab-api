<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class Version
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class Version extends StandaloneResource
{
    /**
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/version.md
     */
    public function get(): array
    {
        return $this->httpClient->get('version')->json();
    }
}
