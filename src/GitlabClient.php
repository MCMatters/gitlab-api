<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi;

use McMatters\GitlabApi\Exceptions\BadResourceException;
use function strtolower, ucfirst;

/**
 * Class GitlabClient
 */
class GitlabClient
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var array
     */
    protected $resources = [];

    /**
     * GitlabClient constructor.
     *
     * @param string $url
     * @param string $token
     */
    public function __construct(string $url, string $token)
    {
        $this->url = $url;
        $this->token = $token;
    }

    /**
     * @param string $name
     *
     * @return mixed
     * @throws BadResourceException
     */
    public function resource(string $name)
    {
        $lowerCaseName = strtolower($name);

        if (!empty($this->resources[$lowerCaseName])) {
            return $this->resources[$lowerCaseName];
        }

        $name = ucfirst($name);

        $class = __NAMESPACE__."\\Resources\\{$name}";

        if (!class_exists($class)) {
            throw new BadResourceException();
        }

        $this->resources[$lowerCaseName] = new $class(
            $this->url,
            $this->token
        );

        return $this->resources[$lowerCaseName];
    }
}
