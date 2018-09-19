<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\NoteTrait;

/**
 * Class MergeRequestNote
 *
 * @package McMatters\GitlabApi\Resources
 */
class MergeRequestNote extends AbstractResource
{
    use NoteTrait;

    /**
     * @var string
     */
    protected $type = 'merge_requests';
}
