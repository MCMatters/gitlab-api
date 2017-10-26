<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const null;
use function array_filter;

class LicenseTemplate extends AbstractResource
{
    public function list()
    {
        return $this->requestGet('templates/licenses');
    }

    public function get(string $key, string $project = null, string $fullName = null)
    {
        return $this->requestGet(
            "templates/licenses/{$key}",
            array_filter(['project' => $project, 'fullname' => $fullName])
        );
    }
}
