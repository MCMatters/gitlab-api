<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\ResourceContexts;

use McMatters\GitlabApi\Resources\User\{CustomAttribute, Event, Project};

/**
 * Class UserContext
 *
 * @package McMatters\GitlabApi\ResourceContexts
 */
class UserContext extends Context
{
    /**
     * @return \McMatters\GitlabApi\Resources\User\CustomAttribute
     */
    public function customAttribute(): CustomAttribute
    {
        return $this->resource(CustomAttribute::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\User\Event
     */
    public function event(): Event
    {
        return $this->resource(Event::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\User\Project
     */
    public function project(): Project
    {
        return $this->resource(Project::class);
    }
}
