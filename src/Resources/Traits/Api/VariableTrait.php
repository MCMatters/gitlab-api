<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits\Api;

use const false;

/**
 * Trait VariableTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits\Api
 */
trait VariableTrait
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
                $this->encodeUrl('{type}/{id}/variables', [$this->type, $id]),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param $id
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
                '{type}/{id}/variables/{key}',
                [$this->type, $id, $key]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $key
     * @param string $value
     * @param bool $protected
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create(
        $id,
        string $key,
        string $value,
        bool $protected = false
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    '{type}/{id}/variables',
                    [$this->type, $id]
                ),
                [
                    'json' => [
                        'key' => $key,
                        'value' => $value,
                        'protected' => $protected,
                    ],
                ]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $key
     * @param string $value
     * @param bool $protected
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update(
        $id,
        string $key,
        string $value,
        bool $protected = false
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    '{type}/{id}/variables/{key}',
                    [$this->type, $id, $key]
                ),
                ['json' => ['value' => $value, 'protected' => $protected]]
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
                'projects/{id}/variables/{key}',
                [$id, $key]
            ))
            ->getStatusCode();
    }
}
