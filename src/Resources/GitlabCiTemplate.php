<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

class GitlabCiTemplate extends AbstractResource
{
    public function list()
    {
        return $this->requestGet('templates/gitlab_ci_ymls');
    }

    public function get(string $key)
    {
        return $this->requestGet("templates/gitlab_ci_ymls/{$key}");
    }
}
