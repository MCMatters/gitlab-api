<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\ResourceContexts;

use McMatters\Ticl\Client;

/**
 * Class Context
 *
 * @package McMatters\GitlabApi\ResourceContexts
 */
class Context
{
    /**
     * @var array
     */
    protected $resources = [];

    /**
     * @var \McMatters\Ticl\Client
     */
    protected $httpClient;

    /**
     * Context constructor.
     *
     * @param \McMatters\Ticl\Client $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $class
     *
     * @return mixed
     */
    protected function resource(string $class)
    {
        if (!isset($this->resources[$class])) {
            $this->resources[$class] = new $class($this->httpClient);
        }

        return $this->resources[$class];
    }
}
