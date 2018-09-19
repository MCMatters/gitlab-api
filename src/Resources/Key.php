<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

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
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(int $id): array
    {
        return $this->httpClient->get("keys/{$id}")->json();
    }
}
