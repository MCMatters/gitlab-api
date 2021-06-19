<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\ResourceContexts\Context;
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
     * @var \McMatters\GitlabApi\ResourceContexts\Context
     */
    protected $context;

    /**
     * Resource constructor.
     *
     * @param \McMatters\Ticl\Client $httpClient
     * @param \McMatters\GitlabApi\ResourceContexts\Context $context
     */
    public function __construct(Client $httpClient, Context $context)
    {
        $this->httpClient = $httpClient;
        $this->context = $context;
    }

    /**
     * @return \McMatters\GitlabApi\ResourceContexts\Context
     */
    public function getContext(): Context
    {
        return $this->context;
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
