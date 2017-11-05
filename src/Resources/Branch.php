<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\RequestException;
use McMatters\GitlabApi\Exceptions\ResponseException;
use const false, null;

/**
 * Class Branch
 *
 * @package McMatters\GitlabApi\Resources
 */
class Branch extends AbstractResource
{
    /**
     * @param int|string $id
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function list($id): array
    {
        return $this->requestGet($this->getUrl($id));
    }

    /**
     * @param int|string $id
     * @param string $branch
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get($id, string $branch): array
    {
        return $this->requestGet($this->getUrl($id, $branch));
    }

    /**
     * @param int|string $id
     * @param string $branch
     * @param string $ref
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create($id, string $branch, string $ref): array
    {
        return $this->requestPost(
            $this->getUrl($id),
            ['branch' => $branch, 'ref' => $ref]
        );
    }

    /**
     * @param int|string $id
     * @param string $branch
     *
     * @return int
     * @throws RequestException
     */
    public function delete($id, string $branch): int
    {
        return $this->requestDelete($this->getUrl($id, $branch));
    }

    /**
     * @param int|string $id
     *
     * @return int
     * @throws RequestException
     */
    public function deleteMerged($id): int
    {
        return $this->requestDelete($this->getUrl($id, null, 'merged'));
    }

    /**
     * @param int|string $id
     * @param string $branch
     * @param array $developersCan
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function protect(
        $id,
        string $branch,
        array $developersCan = ['push' => false, 'merge' => false]
    ): array {
        return $this->requestPut(
            "{$this->getUrl($id, $branch)}/protect",
            [
                'developers_can_push'  => $developersCan['push'] ?? false,
                'developers_can_merge' => $developersCan['merge'] ?? false,
            ]
        );
    }

    /**
     * @param int|string $id
     * @param string $branch
     *
     * @return int
     * @throws RequestException
     */
    public function unprotect($id, string $branch): int
    {
        list($id, $branch) = $this->encode([$id, $branch]);

        return $this->requestDelete("projects/{$id}/protected_branches/{$branch}");
    }

    /**
     * @param int|string $id
     * @param string|null $branch
     * @param string|null $type
     *
     * @return string
     */
    protected function getUrl(
        $id,
        string $branch = null,
        string $type = null
    ): string {
        $branchesType = null !== $type ? "{$type}_branches" : 'branches';

        $url = "projects/{$this->encode($id)}/{$branchesType}";

        return null !== $branch ? "{$url}/{$this->encode($branch)}" : $url;
    }
}
