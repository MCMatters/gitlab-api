<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class Import
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class Import extends StandaloneResource
{
    /**
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/import.md#import-repository-from-github
     */
    public function github(array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->post('import/github')
            ->json();
    }
}
