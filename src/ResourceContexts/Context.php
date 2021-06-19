<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\ResourceContexts;

use McMatters\GitlabApi\GitlabClient;
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
     * @var \McMatters\GitlabApi\GitlabClient
     */
    protected $client;

    /**
     * Context constructor.
     *
     * @param \McMatters\Ticl\Client $httpClient
     * @param \McMatters\GitlabApi\GitlabClient $client
     */
    public function __construct(Client $httpClient, GitlabClient $client)
    {
        $this->httpClient = $httpClient;
        $this->client = $client;
    }

    /**
     * @param string $class
     *
     * @return mixed
     */
    public function resource(string $class)
    {
        if (!isset($this->resources[$class])) {
            $this->resources[$class] = new $class($this->httpClient, $this);
        }

        return $this->resources[$class];
    }

    /**
     * @return \McMatters\GitlabApi\GitlabClient
     */
    public function getClient(): GitlabClient
    {
        return $this->client;
    }
}
