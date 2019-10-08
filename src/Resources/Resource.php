<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\Ticl\Client;

use function preg_replace, rawurlencode;

/**
 * Class Resource
 *
 * @package McMatters\GitlabApi\Resources
 */
abstract class Resource
{
    /**
     * @var \McMatters\Ticl\Client
     */
    protected $httpClient;

    /**
     * Resource constructor.
     *
     * @param \McMatters\Ticl\Client $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $url
     * @param mixed $replacements
     *
     * @return string
     */
    protected function encodeUrl(string $url, $replacements = []): string
    {
        foreach ((array) $replacements as $replacement) {
            $url = preg_replace(
                '/:\w+/',
                rawurlencode((string) $replacement),
                $url,
                1
            );
        }

        return $url;
    }
}
