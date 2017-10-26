<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

class Key extends AbstractResource
{
    public function get(int $id)
    {
        return $this->requestGet("keys/{$id}");
    }
}
