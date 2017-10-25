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
     * @return array|bool Return TRUE if $content is valid otherwise return array with errors.
     * @throws \McMatters\GitlabApi\Exceptions\ResponseException
     * @throws \McMatters\GitlabApi\Exceptions\RequestException
     */
    public function validate(string $content)
    {
        $response = $this->requestPost('lint', ['content' => $content]);

        if (!empty($response['status']) && $response['status'] === 'valid') {
            return true;
        }

        if (array_key_exists('errors', $response)) {
            return $response['errors'];
        }

        return [$response['error']];
    }
}
