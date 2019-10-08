<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class Suggestion
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class Suggestion extends StandaloneResource
{
    /**
     * @param int|string $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/suggestions.md#applying-suggestions
     */
    public function apply($id): array
    {
        return $this->httpClient
            ->put($this->encodeUrl('suggestions/:id/apply', $id))
            ->json();
    }
}
