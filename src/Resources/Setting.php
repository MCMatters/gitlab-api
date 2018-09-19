<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class Setting
 *
 * @package McMatters\GitlabApi\Resources
 */
class Setting extends AbstractResource
{
    /**
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(): array
    {
        return $this->httpClient->get('application/settings')->json();
    }

    /**
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update(array $data): array
    {
        return $this->httpClient
            ->put('application/settings', ['json' => $data])
            ->json();
    }
}
