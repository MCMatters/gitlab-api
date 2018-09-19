<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const true;
use function array_key_exists;

/**
 * Class CiConfiguration
 *
 * @package McMatters\GitlabApi\Resources
 */
class CiConfiguration extends AbstractResource
{
    /**
     * @param string $content
     *
     * @return array|bool Return true if $content is valid otherwise return an array with errors.
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function validate(string $content)
    {
        $response = $this->httpClient
            ->post('lint', ['json' => ['content' => $content]])
            ->json();

        if (!empty($response['status']) && $response['status'] === 'valid') {
            return true;
        }

        if (array_key_exists('errors', $response)) {
            return $response['errors'];
        }

        return [$response['error']];
    }
}
