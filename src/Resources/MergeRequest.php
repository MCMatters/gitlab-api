<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use function array_merge;

class MergeRequest extends AbstractResource
{
    public function list(array $filters = [])
    {
        return $this->requestGet('merge_requests', $filters);
    }

    public function projectList($id, array $filters = [])
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/merge_requests", $filters);
    }

    public function get($id, int $iid)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/merge_requests/{$iid}");
    }

    public function create(
        $id,
        string $source,
        string $target,
        string $title,
        array $data = []
    ) {
        $id = $this->encode($id);

        $data = array_merge(
            [
                'source_branch' => $source,
                'target_branch' => $target,
                'title'         => $title,
            ],
            $data
        );

        return $this->requestPost(
            "projects/{$id}/merge_requests",
            $data
        );
    }

    public function update($id, int $iid, array $data = [])
    {
        $id = $this->encode($id);

        return $this->requestPut(
            "projects/{$id}/merge_requests/{$iid}",
            $data
        );
    }

    public function delete($id, int $iid)
    {
        $id = $this->encode($id);

        return $this->requestDelete("projects/{$id}/merge_requests/{$iid}");
    }

    public function commits($id, int $iid)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/merge_requests/{$iid}/commits");
    }

    public function changes($id, int $iid)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/merge_requests/{$iid}/changes");
    }

    public function accept($id, int $iid)
    {
        $id = $this->encode($id);

        // todo: handle errors. create exception classes
        return $this->requestPut("projects/{$id}/merge_requests/{$iid}/merge");
    }

    public function cancelWhenPipelineSucceeds($id, int $iid)
    {
        $id = $this->encode($id);

        // todo: handle errors. create exception classes
        return $this->requestPut(
            "projects/{$id}/merge_requests/{$iid}/cancel_merge_when_pipeline_succeeds"
        );
    }

    public function comments($id, int $iid)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/merge_requests/{$iid}/notes");
    }

    public function comment($id, int $iid, int $noteId)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/merge_requests/{$iid}/notes/{$noteId}");
    }

    public function createComment($id, int $iid, string $body)
    {
        $id = $this->encode($id);

        return $this->requestPost(
            "projects/{$id}/merge_requests/{$iid}/notes",
            ['body' => $body]
        );
    }

    public function updateComment($id, int $iid, int $noteId, string $body)
    {
        $id = $this->encode($id);

        return $this->requestPut(
            "projects/{$id}/merge_requests/{$iid}/notes/{$noteId}",
            ['body' => $body]
        );
    }

    public function deleteComment($id, int $iid, int $noteId)
    {
        $id = $this->encode($id);

        return $this->requestDelete("projects/{$id}/merge_requests/{$iid}/notes/{$noteId}");
    }

    public function listIssuesWillBeClosed($id, int $iid)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/merge_requests/{$iid}/closes_issues");
    }

    public function subscribe($id, int $iid)
    {
        $id = $this->encode($id);

        return $this->requestPost("projects/{$id}/merge_requests/{$iid}/subscribe");
    }

    public function unsubscribe($id, int $iid)
    {
        $id = $this->encode($id);

        return $this->requestPost("projects/{$id}/merge_requests/{$iid}/unsubscribe");
    }

    public function createTodo($id, int $iid)
    {
        $id = $this->encode($id);

        return $this->requestPost("projects/{$id}/merge_requests/{$iid}/todo");
    }

    public function diffVersions($id, int $iid)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/merge_requests/{$iid}/versions");
    }

    public function diffVersion($id, int $iid, int $versionId)
    {
        $id = $this->encode($id);

        return $this->requestGet(
            "projects/{$id}/merge_requests/{$iid}/versions/{$versionId}"
        );
    }

    public function setEstimatedTime($id, int $iid, string $duration)
    {
        $id = $this->encode($id);

        return $this->requestPost(
            "projects/{$id}/merge_requests/{$iid}/time_estimate",
            ['duration' => $duration]
        );
    }

    public function resetEstimatedTime($id, int $iid)
    {
        $id = $this->encode($id);

        return $this->requestPost(
            "projects/{$id}/merge_requests/{$iid}/reset_time_estimate"
        );
    }

    public function createSpentTime($id, int $iid, string $duration)
    {
        $id = $this->encode($id);

        return $this->requestPost(
            "projects/{$id}/merge_requests/{$iid}/add_spent_time",
            ['duration' => $duration]
        );
    }

    public function resetSpentTime($id, int $iid)
    {
        $id = $this->encode($id);

        return $this->requestPost("projects/{$id}/merge_requests/{$iid}/reset_spent_time");
    }

    public function getTimeTrackingStatistics($id, int $iid)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/merge_requests/{$iid}/time_stats");
    }
}
