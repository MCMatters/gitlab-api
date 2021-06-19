<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class Application
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class Application extends StandaloneResource
{
    /**
     * @param string $name
     * @param string $redirectUri
     * @param string $scopes
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/applications.md#create-an-application
     */
    public function create(
        string $name,
        string $redirectUri,
        string $scopes
    ): array {
        return $this->httpClient
            ->withJson([
                'name' => $name,
                'redirect_uri' => $redirectUri,
                'scopes' => $scopes,
            ])
            ->post('applications')
            ->json();
    }

    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/applications.md#list-all-applications
     */
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('applications')
            ->json();
    }

    /**
     * @param int $id
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/applications.md#delete-an-application
     */
    public function delete(int $id): int
    {
        return $this->httpClient->delete("applications/{$id}")->getStatusCode();
    }
}
