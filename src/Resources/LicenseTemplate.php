<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const null;

/**
 * Class LicenseTemplate
 *
 * @package McMatters\GitlabApi\Resources
 */
class LicenseTemplate extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->get('templates/licenses', ['query' => $query])
            ->json();
    }

    /**
     * @param string $key
     * @param string|null $project
     * @param string|null $fullName
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(
        string $key,
        string $project = null,
        string $fullName = null
    ): array {
        return $this->httpClient
            ->get(
                $this->encodeUrl('templates/licenses/{key}', $key),
                ['query' => ['project' => $project, 'fullname' => $fullName]]
            )
            ->json();
    }
}
