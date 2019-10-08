<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits;

/**
 * Class ContainerRegistryTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait ContainerRegistryTrait
{
    /**
     * @param int|string $id
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/container_registry.md#list-registry-repositories
     * @see https://gitlab.com/help/api/container_registry.md#within-a-group
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    ':type/:id/registry/repositories',
                    [$this->type, $id]
                ),
                ['query' => $query]
            )
            ->json();
    }
}
