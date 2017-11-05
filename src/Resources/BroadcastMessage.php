<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const null;
use function array_filter;

/**
 * Class BroadcastMessage
 *
 * @package McMatters\GitlabApi\Resources
 */
class BroadcastMessage extends AbstractResource
{
    /**
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list(): array
    {
        return $this->requestGet($this->getUrl());
    }

    /**
     * @param int $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get(int $id): array
    {
        return $this->requestGet($this->getUrl($id));
    }

    /**
     * @param string $message
     * @param mixed $startsAt
     * @param mixed $endsAt
     * @param string|null $color
     * @param string|null $font
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create(
        string $message,
        $startsAt = null,
        $endsAt = null,
        string $color = null,
        string $font = null
    ): array {
        return $this->requestPost(
            $this->getUrl(),
            array_filter([
                'message'   => $message,
                'starts_at' => $startsAt,
                'ends_at'   => $endsAt,
                'color'     => $color,
                'font'      => $font,
            ])
        );
    }

    /**
     * @param int $id
     * @param array $data
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function update(int $id, array $data = []): array
    {
        return $this->requestPut($this->getUrl($id), $data);
    }

    /**
     * @param int $id
     *
     * @return int
     * @throws RequestException
     */
    public function delete(int $id): int
    {
        return $this->requestDelete($this->getUrl($id));
    }

    /**
     * @param int|null $id
     *
     * @return string
     */
    protected function getUrl(int $id = null): string
    {
        $url = 'broadcast_messages';

        return null !== $id ? "{$url}/{$id}" : $url;
    }
}
