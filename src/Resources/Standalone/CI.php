<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

use const true;

/**
 * Class Ci
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class CI extends StandaloneResource
{
    /**
     * @param string $content
     *
     * @return array|bool Return true if $content is valid otherwise return an array with errors.
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/lint.md#validate-the-gitlab-ciyml-api
     */
    public function lint(string $content)
    {
        $response = $this->httpClient
            ->post('lint', ['json' => ['content' => $content]])
            ->json();

        if (!empty($response['status']) && $response['status'] === 'valid') {
            return true;
        }

        if (!empty($response['errors'])) {
            return $response['errors'];
        }

        return isset($response['error']) ? [$response['error']] : [];
    }
}
