<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const null;
use function array_filter;

class ProjectMilestone extends AbstractResource
{
    public function list($id, array $iids = [], string $state = null, string $search = null)
    {
        $id = $this->encode($id);

        return $this->requestGet(
            "projects/{$id}/milestones",
            array_filter([
                'iids'   => $iids,
                'state'  => $state,
                'search' => $search,
            ])
        );
    }

    public function get($id, int $milestoneId)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/milestones/{$milestoneId}");
    }

    public function create(
        $id,
        string $title,
        string $description = null,
        $dueDate = null,
        $startDate = null
    ) {
        $id = $this->encode($id);

        return $this->requestPost(
            "projects/{$id}/milestones",
            array_filter([
                'title'       => $title,
                'description' => $description,
                'due_date'    => (string) $dueDate,
                'start_date'  => (string) $startDate,
            ])
        );
    }

    public function update($id, int $milestoneId, array $data = [])
    {
        $id = $this->encode($id);

        return $this->requestPut(
            "projects/{$id}/milestones/{$milestoneId}",
            $data
        );
    }

    public function issues($id, int $milestoneId)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/milestones/{$milestoneId}/issues");
    }

    public function mergeRequests($id, int $milestoneId)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/milestones/{$milestoneId}/merge_requests");
    }
}
