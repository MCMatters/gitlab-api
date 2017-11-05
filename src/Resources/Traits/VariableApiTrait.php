<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const false, null;

/**
 * Trait VariableApiTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait VariableApiTrait
{
    use ResourceTypeTrait;

    /**
     * @param int|string $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list($id): array
    {
        return $this->requestGet($this->getUrl($id));
    }

    /**
     * @param int|string $id
     * @param string $key
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get($id, string $key): array
    {
        return $this->requestGet($this->getUrl($id, $key));
    }

    /**
     * @param int|string $id
     * @param string $key
     * @param string $value
     * @param bool $protected
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create(
        $id,
        string $key,
        string $value,
        bool $protected = false
    ): array {
        return $this->requestPost(
            $this->getUrl($id),
            ['key' => $key, 'value' => $value, 'protected' => $protected]
        );
    }

    /**
     * @param int|string $id
     * @param string $key
     * @param string $value
     * @param bool $protected
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function update(
        $id,
        string $key,
        string $value,
        bool $protected = false
    ): array {
        return $this->requestPut(
            $this->getUrl($id, $key),
            ['value' => $value, 'protected' => $protected]
        );
    }

    /**
     * @param int|string $id
     * @param string $key
     *
     * @return int
     * @throws RequestException
     */
    public function delete($id, string $key): int
    {
        return $this->requestDelete($this->getUrl($id, $key));
    }

    /**
     * @param int|string $id
     * @param string|null $key
     *
     * @return string
     */
    protected function getUrl($id, string $key = null): string
    {
        $id = $this->encode($id);
        $type = $this->getResourceType('Variable');

        $url = "{$type}s/{$id}/variables";

        return null !== $key ? "{$url}/{$this->encode($key)}" : $url;
    }
}
