<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const null;
use function array_key_exists;

class Commit extends AbstractResource
{
    public function list($id, string $ref = '', $since = null, $until = null)
    {
        $id = $this->encode($id);

        return $this->requestGet(
            "projects/{$id}/repository/commits",
            [
                'ref'   => $ref,
                'since' => $this->transformNullableDate($since),
                'until' => $this->transformNullableDate($until),
            ]
        );
    }

    public function get($id, string $sha)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/repository/commits/{$sha}");
    }

    public function create(
        $id,
        string $branch,
        string $message,
        array $actions,
        string $startBranch = null,
        array $author = []
    ) {
        $id = $this->encode($id);

        return $this->requestPost(
            "projects/{$id}/repository/commits",
            [
                'branch'         => $branch,
                'commit_message' => $message,
                'start_branch'   => $startBranch,
                'actions'        => $actions,
                'author_email'   => $author['email'] ?? null,
                'author_name'    => $author['name'] ?? null,
            ]
        );
    }

    public function cherryPick($id, string $sha, string $branch)
    {
        $id = $this->encode($id);

        return $this->requestPost(
            "projects/{$id}/repository/commits/{$sha}/cherry_pick",
            ['branch' => $branch]
        );
    }

    public function diff($id, string $sha)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/repository/commits/{$sha}/diff");
    }

    public function comments($id, string $sha)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/repository/commits/{$sha}/comments");
    }

    public function createComment(
        $id,
        string $sha,
        string $comment,
        array $file = ['path' => null, 'line' => null, 'line_type' => 'new']
    ) {
        $id = $this->encode($id);

        return $this->requestPost(
            "projects/{$id}/repository/commits/{$sha}/comments",
            [
                'note'      => $comment,
                'path'      => $file['path'] ?? null,
                'line'      => $file['line'] ?? null,
                'line_type' => $file['line_type'] ?? 'new',
            ]
        );
    }

    public function status($id, string $sha, array $filters = [])
    {
        $id = $this->encode($id);

        return $this->requestGet(
            "projects/{$id}/repository/commits/{$sha}/statuses",
            $filters
        );
    }

    public function postStatus($id, string $sha, string $state, array $data)
    {
        $id = $this->encode($id);

        $nameKey = array_key_exists('context', $data) ? 'context' : 'name';

        return $this->requestPost(
            "projects/{$id}/statuses/{$sha}",
            [
                'state'       => $state,
                $nameKey      => $data[$nameKey] ?? null,
                'target_url'  => $data['target_url'] ?? null,
                'description' => $data['description'] ?? null,
                'coverage'    => $data['coverage'] ?? null,
            ]
        );
    }
}
