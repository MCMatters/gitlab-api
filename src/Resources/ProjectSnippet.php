<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Interfaces\Visibility;

class ProjectSnippet extends AbstractResource implements Visibility
{
    public function list($id)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/snippets");
    }

    public function get($id, int $snippetId)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/snippets/{$snippetId}");
    }

    public function create(
        $id,
        string $title,
        string $code,
        string $fileName,
        string $visibility = self::VISIBILITY_PUBLIC,
        string $description = null
    ) {
        $id = $this->encode($id);

        return $this->requestPost(
            "projects/{$id}/snippets",
            [
                'title'       => $title,
                'code'        => $code,
                'file_name'   => $fileName,
                'visibility'  => $visibility,
                'description' => $description,
            ]
        );
    }

    public function update($id, int $snippetId, array $data = [])
    {
        $id = $this->encode($id);

        return $this->requestPut("projects/{$id}/snippets/{$snippetId}", $data);
    }

    public function delete($id, int $snippetId)
    {
        $id = $this->encode($id);

        return $this->requestDelete("projects/{$id}/snippets/{$snippetId}");
    }

    public function rawContent($id, int $snippetId)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/snippets/{$snippetId}/raw");
    }

    public function userAgentDetails($id, int $snippetId)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/snippets/{$snippetId}/user_agent_detail");
    }
}
