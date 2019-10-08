<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi;

use McMatters\GitlabApi\ResourceContexts\{
    GroupContext, ProjectContext, StandaloneContext, TemplateContext,
    UserContext
};
use McMatters\Ticl\Client;

use function rtrim;

use const true;

/**
 * Class GitlabClient
 */
class GitlabClient
{
    /**
     * @var \McMatters\Ticl\Client
     */
    protected $httpClient;

    /**
     * @var array
     */
    protected $resourceContexts = [];

    /**
     * GitlabClient constructor.
     *
     * @param string $url
     * @param string $token
     */
    public function __construct(string $url, string $token)
    {
        $url = rtrim($url, '/').'/api/v4/';

        $this->httpClient = new Client([
            'base_uri' => $url,
            'headers' => ['PRIVATE-TOKEN' => $token],
            'filter_nulls' => true,
        ]);
    }

    /**
     * @return \McMatters\GitlabApi\ResourceContexts\GroupContext
     */
    public function group(): GroupContext
    {
        return $this->resourceContext(GroupContext::class);
    }

    /**
     * @return \McMatters\GitlabApi\ResourceContexts\ProjectContext
     */
    public function project(): ProjectContext
    {
        return $this->resourceContext(ProjectContext::class);
    }

    /**
     * @return \McMatters\GitlabApi\ResourceContexts\StandaloneContext
     */
    public function standalone(): StandaloneContext
    {
        return $this->resourceContext(StandaloneContext::class);
    }

    /**
     * @return \McMatters\GitlabApi\ResourceContexts\TemplateContext
     */
    public function template(): TemplateContext
    {
        return $this->resourceContext(TemplateContext::class);
    }

    /**
     * @return \McMatters\GitlabApi\ResourceContexts\UserContext
     */
    public function user(): UserContext
    {
        return $this->resourceContext(UserContext::class);
    }

    /**
     * @param string $class
     *
     * @return mixed
     */
    protected function resourceContext(string $class)
    {
        if (!isset($this->resourceContexts[$class])) {
            $this->resourceContexts[$class] = new $class($this->httpClient);
        }

        return $this->resourceContexts[$class];
    }
}
