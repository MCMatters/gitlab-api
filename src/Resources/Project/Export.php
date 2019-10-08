<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Resource;

/**
 * Class ProjectImportExport
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Export extends ProjectResource
{
    /**
     * @param int|string $id
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/project_import_export.md#schedule-an-export
     */
    public function export($id, array $data): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/:id/export', $id),
                ['json' => $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/project_import_export.md#export-status
     */
    public function status($id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('projects/:id/export', $id))
            ->json();
    }

    /**
     * @param int|string $id
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/project_import_export.md#export-download
     */
    public function download($id): string
    {
        return $this->httpClient
            ->get($this->encodeUrl('projects/:id/export/download', $id))
            ->getBody();
    }
}
