<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class Key
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class Key extends StandaloneResource
{
    /**
     * @param int $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/keys.md#get-ssh-key-with-user-by-id-of-an-ssh-key
     */
    public function get(int $id): array
    {
        return $this->httpClient->get("keys/{$id}")->json();
    }
}
