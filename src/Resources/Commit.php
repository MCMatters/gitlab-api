<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class Commit
 *
 * @package McMatters\GitlabApi\Resources
 */
class Commit extends AbstractResource
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
                $this->encodeUrl('projects/{id}/repository/commits', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $branch
     * @param string $message
     * @param array $actions
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create(
        $id,
        string $branch,
        string $message,
        array $actions,
        array $data = []
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/repository/commits', $id),
                [
                    'json' => [
                            'branch' => $branch,
                            'commit_message' => $message,
                            'actions' => $actions,
                        ] + $data,
                ]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $sha
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get($id, string $sha, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/repository/commits/{sha}',
                    [$id, $sha]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $sha
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function references($id, string $sha, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/repository/commits/{sha}/refs',
                    [$id, $sha]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $sha
     * @param string $branch
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function cherryPick($id, string $sha, string $branch): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/{id}/repository/commits/{sha}/cherry_pick',
                    [$id, $sha]
                ),
                ['json' => ['branch' => $branch]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $sha
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function diff($id, string $sha): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/repository/commits/{sha}/diff',
                [$id, $sha]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $sha
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function comments($id, string $sha, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/repository/commits/{sha}/comments',
                    [$id, $sha]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $sha
     * @param string $comment
     * @param array $file
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createComment(
        $id,
        string $sha,
        string $comment,
        array $file = []
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/{id}/repository/commits/{sha}/comments',
                    [$id, $sha]
                ),
                ['json' => ['note' => $comment] + $file]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $sha
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function statuses($id, string $sha, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/repository/commits/{sha}/statuses',
                    [$id, $sha]
                ),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $sha
     * @param string $state
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function postBuildStatus(
        $id,
        string $sha,
        string $state,
        array $data = []
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/{id}/statuses/{sha}',
                    [$id, $sha]
                ),
                ['json' => ['state' => $state] + $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $sha
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function mergeRequests($id, string $sha, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/{id}/repository/commits/{sha}/merge_requests',
                    [$id, $sha]
                ),
                ['query' => $query]
            )
            ->json();
    }
}
