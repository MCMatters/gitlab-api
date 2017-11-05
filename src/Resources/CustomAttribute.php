<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const null;

/**
 * Class CustomAttribute
 *
 * @package McMatters\GitlabApi\Resources
 */
class CustomAttribute extends AbstractResource
{
    /**
     * @param int $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list(int $id): array
    {
        return $this->requestGet($this->getUrl($id));
    }

    /**
     * @param int $id
     * @param string $key
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get(int $id, string $key): array
    {
        return $this->requestGet($this->getUrl($id, $key));
    }

    /**
     * @param int $id
     * @param string $key
     * @param string $value
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function set(int $id, string $key, string $value): array
    {
        return $this->requestPut($this->getUrl($id, $key), ['value' => $value]);
    }

    /**
     * @param int $id
     * @param string $key
     *
     * @return int
     * @throws RequestException
     */
    public function delete(int $id, string $key): int
    {
        return $this->requestDelete($this->getUrl($id, $key));
    }

    /**
     * @param int $id
     * @param string|null $key
     *
     * @return string
     */
    protected function getUrl(int $id, string $key = null): string
    {
        $url = "users/{$id}/custom_attributes";

        return null !== $key ? "{$url}/{$key}" : $url;
    }
}
