<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Traits;

/**
 * Trait CustomAttributesTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait CustomAttributesTrait
{
    use HasAllTrait;

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
     * @see https://gitlab.com/help/api/custom_attributes.md#list-custom-attributes
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(
                ':type/:id/custom_attributes',
                [$this->type, $id]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param array $query
     *
     * @return array
     */
    public function all($id, array $query = []): array
    {
        return $this->fetchAllResources('list', [$id, $query]);
    }

    /**
     * @param int|string $id
     * @param string $key
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/custom_attributes.md#single-custom-attribute
     */
    public function get($id, string $key): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                ':type/:id/custom_attributes/:key',
                [$this->type, $id, $key]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $key
     * @param string $value
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/custom_attributes.md#set-custom-attribute
     */
    public function set($id, string $key, string $value): array
    {
        return $this->httpClient
            ->withJson(['value' => $value])
            ->put($this->encodeUrl(
                ':type/:id/custom_attributes/:key',
                [$this->type, $id, $key]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $key
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/custom_attributes.md#delete-custom-attribute
     */
    public function delete($id, string $key): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                ':type/:id/custom_attributes/:key',
                [$this->type, $id, $key]
            ))
            ->getStatusCode();
    }
}
