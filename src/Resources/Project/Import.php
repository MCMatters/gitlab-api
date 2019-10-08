<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class Import
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Import extends ProjectResource
{
    /**
     * @param string $file
     * @param string $path
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/project_import_export.md#import-a-file
     */
    public function import(string $file, string $path, array $data = []): array
    {
        return $this->httpClient
            ->post(
                'projects/import',
                ['form' => ['file' => $file, 'path' => $path] + $data]

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
     * @see https://gitlab.com/help/api/project_import_export.md#import-status
     */
    public function status($id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('projects/:id/import', $id))
            ->json();
    }
}
