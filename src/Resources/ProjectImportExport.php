<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class ProjectImportExport
 *
 * @package McMatters\GitlabApi\Resources
 */
class ProjectImportExport extends AbstractResource
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
     */
    public function export($id, array $data): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/export', $id),
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
     */
    public function exportStatus($id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('projects/{id}/export', $id))
            ->json();
    }

    /**
     * @param int|string $id
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function exportDownload($id): string
    {
        return $this->httpClient
            ->get($this->encodeUrl('projects/{id}/export/download', $id))
            ->getBody();
    }

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
     */
    public function importStatus($id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('projects/{id}/import', $id))
            ->json();
    }
}
