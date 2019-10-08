<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class ManagedLicense
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class ManagedLicense extends ProjectResource
{
    /**
     * @param int|string $id
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/managed_licenses.md#list-managed-licenses
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/:id/managed_licenses', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int|string $managedLicenseId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/managed_licenses.md#show-an-existing-managed-license
     */
    public function get($id, $managedLicenseId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/managed_licenses/:managed_license_id',
                [$id, $managedLicenseId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $name
     * @param string $approvalStatus
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/managed_licenses.md#create-a-new-managed-license
     */
    public function create($id, string $name, string $approvalStatus): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/:id/managed_licenses', $id),
                ['json' => ['name' => $name, 'approval_status' => $approvalStatus]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int|string $managedLicenseId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/managed_licenses.md#delete-a-managed-license
     */
    public function delete($id, $managedLicenseId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/managed_licenses/:managed_license_id',
                [$id, $managedLicenseId]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int|string $managedLicenseId
     * @param string $approvalStatus
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/managed_licenses.md#edit-an-existing-managed-license
     */
    public function update(
        $id,
        $managedLicenseId,
        string $approvalStatus
    ): array {
        return $this->httpClient
            ->patch(
                $this->encodeUrl(
                    'projects/:id/managed_licenses/:managed_license_id',
                    [$id, $managedLicenseId]
                ),
                ['json' => ['approval_status' => $approvalStatus]]
            )
            ->json();
    }
}
