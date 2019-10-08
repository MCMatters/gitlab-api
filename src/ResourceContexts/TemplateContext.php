<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\ResourceContexts;

use McMatters\GitlabApi\Resources\Template\{
    Dockerfile, Gitignore, GitlabCi, License
};

/**
 * Class TemplateContext
 *
 * @package McMatters\GitlabApi\ResourceContexts
 */
class TemplateContext extends Context
{
    /**
     * @return \McMatters\GitlabApi\Resources\Template\Dockerfile
     */
    public function dockerfile(): Dockerfile
    {
        return $this->resource(Dockerfile::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Template\Gitignore
     */
    public function gitignore(): Gitignore
    {
        return $this->resource(Gitignore::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Template\GitlabCi
     */
    public function gitlabCi(): GitlabCi
    {
        return $this->resource(GitlabCi::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Template\License
     */
    public function license(): License
    {
        return $this->resource(License::class);
    }
}
