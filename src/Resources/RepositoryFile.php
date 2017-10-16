<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use function array_merge;

class RepositoryFile extends AbstractResource
{
    public function get($id, string $file, string $ref)
    {
        list($id, $file) = $this->encode([$id, $file]);

        return $this->requestGet(
            "projects/{$id}/repository/files/{$file}",
            ['ref' => $ref]
        );
    }

    public function getRaw($id, string $file, string $ref)
    {
        list($id, $file) = $this->encode([$id, $file]);

        return $this->requestGet(
            "projects/{$id}/repository/files/{$file}/raw",
            ['ref' => $ref]
        );
    }

    public function create(
        $id,
        string $file,
        string $branch,
        string $content,
        string $message,
        array $data = []
    ) {
        list($id, $file) = $this->encode([$id, $file]);

        $data = array_merge(
            [
                'branch'         => $branch,
                'content'        => $content,
                'commit_message' => $message,
            ],
            $data
        );

        return $this->requestPost(
            "projects/{$id}/repository/files/{$file}",
            $data
        );
    }

    public function update(
        $id,
        string $file,
        string $branch,
        string $content,
        string $message,
        array $data = []
    ) {
        list($id, $file) = $this->encode([$id, $file]);

        $data = array_merge(
            [
                'branch'         => $branch,
                'content'        => $content,
                'commit_message' => $message,
            ],
            $data
        );

        return $this->requestPut(
            "projects/{$id}/repository/files/{$file}",
            $data
        );
    }

    public function delete(
        $id,
        string $file,
        string $branch,
        string $message,
        array $data = []
    ) {
        list($id, $file) = $this->encode([$id, $file]);

        $data = array_merge(
            [
                'branch'         => $branch,
                'commit_message' => $message,
            ],
            $data
        );

        return $this->requestDelete(
            "projects/{$id}/repository/files/{$file}",
            $data
        );
    }
}
