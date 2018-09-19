<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits\Api;

/**
 * Trait CustomAttributesTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits\Api
 */
trait CustomAttributesTrait
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @param int|string $id
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    '{type}/{id}/custom_attributes',
                    [$this->type, $id]
                ),
                ['query' => $query]
            )
            ->json();
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
     */
    public function get($id, string $key): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                '{type}/{id}/custom_attributes/{key}',
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
     */
    public function set($id, string $key, string $value): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    '{type}/{id}/custom_attributes/{key}',
                    [$this->type, $id, $key]
                ),
                ['json' => ['value' => $value]]
            )
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
     */
    public function delete($id, string $key): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                '{type}/{id}/custom_attributes/{key}',
                [$this->type, $id, $key]
            ))
            ->getStatusCode();
    }
}
