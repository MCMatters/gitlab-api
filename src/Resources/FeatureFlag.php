<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const null;

/**
 * Class FeatureFlag
 *
 * @package McMatters\GitlabApi\Resources
 */
class FeatureFlag extends AbstractResource
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
            ->get('features', ['query' => $query])
            ->json();
    }

    /**
     * @param string $name
     * @param $value
     * @param string|null $group
     * @param string|null $user
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function set(
        string $name,
        $value,
        string $group = null,
        string $user = null
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl('features/{name}', $name),
                [
                    'json' => [
                        'value' => $value,
                        'feature_group' => $group,
                        'user' => $user,
                    ],
                ]
            )
            ->json();
    }

    /**
     * @param string $name
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function delete(string $name): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl('features/{name}', $name))
            ->getStatusCode();
    }
}
