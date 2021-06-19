<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

use const null;

/**
 * Class Avatar
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class Avatar extends StandaloneResource
{
    /**
     * @param string $email
     * @param array $query
     *
     * @return string|null
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/avatar.md#get-a-single-avatar-url
     */
    public function getUrl(string $email, array $query = []): ?string
    {
        $response = $this->httpClient
            ->withQuery(['email' => $email] + $query)
            ->get('avatar')
            ->json();

        return $response['avatar_url'] ?? null;
    }
}
