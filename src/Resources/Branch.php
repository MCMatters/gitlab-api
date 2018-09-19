<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const false;

/**
 * Class Branch
 *
 * @package McMatters\GitlabApi\Resources
 */
class Branch extends AbstractResource
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
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/repository/branches', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $branch
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get($id, string $branch): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/repository/branches/{branch}',
                    [$id, $branch]
                )
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $branch
     * @param array $developersCan
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function protect(
        $id,
        string $branch,
        array $developersCan = ['push' => false, 'merge' => false]
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/{id}/repository/branches/{branch}/protect',
                    [$id, $branch]
                ),
                [
                    'json' => [
                        'developers_can_push' => $developersCan['push'] ?? false,
                        'developers_can_merge' => $developersCan['merge'] ?? false,
                    ],
                ]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $branch
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function unprotect($id, string $branch): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/{id}/protected_branches/{branch}',
                [$id, $branch]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param string $branch
     * @param string $ref
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create($id, string $branch, string $ref): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/repository/branches', $id),
                ['json' => ['branch' => $branch, 'ref' => $ref]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $branch
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function delete($id, string $branch): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/{id}/repository/branches/{branch}',
                [$id, $branch]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function deleteMerged($id): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/{id}/repository/merged_branches',
                $id
            ))
            ->getStatusCode();
    }
}
