<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class Version
 *
 * @package McMatters\GitlabApi\Resources
 */
class Version extends AbstractResource
{
    /**
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(): array
    {
        return $this->httpClient->get('version')->json();
    }
}
