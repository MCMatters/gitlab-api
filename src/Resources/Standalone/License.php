<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class License
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class License extends StandaloneResource
{
    /**
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/license.md#retrieve-information-about-the-current-license
     */
    public function get(): array
    {
        return $this->httpClient->get('license')->json();
    }

    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/license.md#retrieve-information-about-all-licenses
     */
    public function all(array $query = []): array
    {
        return $this->httpClient->withQuery($query)->get('licenses')->json();
    }

    /**
     * @param string $license
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/license.md#add-a-new-license
     */
    public function create(string $license): array
    {
        return $this->httpClient
            ->withJson(['license' => $license])
            ->post('license')
            ->json();
    }

    /**
     * @param int $id
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/license.md#delete-a-license
     */
    public function delete(int $id): int
    {
        return $this->httpClient->delete("license/{$id}")->getStatusCode();
    }
}
