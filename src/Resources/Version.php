<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

class Version extends AbstractResource
{
    public function get()
    {
        return $this->requestGet('version');
    }
}
