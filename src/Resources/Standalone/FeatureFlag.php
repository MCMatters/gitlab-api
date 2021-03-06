<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class FeatureFlag
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class FeatureFlag extends StandaloneResource
{
    use HasAllTrait;

    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/features.md#list-all-features
     */
    public function list(array $query = []): array
    {
        return $this->httpClient->withQuery($query)->get('features')->json();
    }

    /**
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): array
    {
        return $this->fetchAllResources('list', [$query]);
    }

    /**
     * @param string $name
     * @param mixed $value
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/features.md#set-or-create-a-feature
     */
    public function set(string $name, $value, array $data = []): array
    {
        return $this->httpClient
            ->withJson(['value' => $value] + $data)
            ->post($this->encodeUrl('features/:name', $name))
            ->json();
    }

    /**
     * @param string $name
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/features.md#delete-a-feature
     */
    public function delete(string $name): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl('features/:name', $name))
            ->getStatusCode();
    }
}
