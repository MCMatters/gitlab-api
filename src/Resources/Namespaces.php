<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

class Namespaces extends AbstractResource
{
    public function list(int $page = 1, int $perPage = 20)
    {
        return $this->requestGet(
            'namespaces',
            ['page' => $page, 'per_page' => $perPage]
        );
    }

    public function search(string $search = null, int $page = 1, int $perPage = 20)
    {
        return $this->requestGet(
            'namespaces',
            ['search' => $search, 'page' => $page, 'per_page' => $perPage]
        );
    }
}
