<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

class GitignoreTemplate extends AbstractResource
{
    public function list()
    {
        return $this->requestGet('templates/gitignores');
    }

    public function get(string $key)
    {
        return $this->requestGet("templates/gitignores/{$key}");
    }
}
