<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class Commit
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Commit extends ProjectResource
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
     * @see https://gitlab.com/help/api/commits.md#list-repository-commits
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/:id/repository/commits', $id),
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
     *
     * @see https://gitlab.com/help/api/commits.md#create-a-commit-with-multiple-files-and-actions
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
                $this->encodeUrl('projects/:id/repository/commits', $id),
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
     *
     * @see https://gitlab.com/help/api/commits.md#get-a-single-commit
     */
    public function get($id, string $sha, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/:id/repository/commits/:sha',
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
     *
     * @see https://gitlab.com/help/api/commits.md#get-references-a-commit-is-pushed-to
     */
    public function references($id, string $sha, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/:id/repository/commits/:sha/refs',
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
     *
     * @see https://gitlab.com/help/api/commits.md#cherry-pick-a-commit
     */
    public function cherryPick($id, string $sha, string $branch): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/:id/repository/commits/:sha/cherry_pick',
                    [$id, $sha]
                ),
                ['json' => ['branch' => $branch]]
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
     *
     * @see https://gitlab.com/help/api/commits.md#revert-a-commit
     */
    public function revert($id, string $sha, string $branch): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/:id/repository/commits/:sha/revert',
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
     *
     * @see https://gitlab.com/help/api/commits.md#get-the-diff-of-a-commit
     */
    public function diff($id, string $sha): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/repository/commits/:sha/diff',
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
     *
     * @see https://gitlab.com/help/api/commits.md#get-the-comments-of-a-commit
     */
    public function comments($id, string $sha, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/:id/repository/commits/:sha/comments',
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
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/commits.md#post-comment-to-commit
     */
    public function createComment(
        $id,
        string $sha,
        string $comment,
        array $data = []
    ): array {
        return $this->httpClient
            ->post(
                $this->encodeUrl(
                    'projects/:id/repository/commits/:sha/comments',
                    [$id, $sha]
                ),
                ['json' => ['note' => $comment] + $data]
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
     *
     * @see https://gitlab.com/help/api/commits.md#list-the-statuses-of-a-commit
     */
    public function statuses($id, string $sha, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/:id/repository/commits/:sha/statuses',
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
     *
     * @see https://gitlab.com/help/api/commits.md#post-the-build-status-to-a-commit
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
                    'projects/:id/statuses/:sha',
                    [$id, $sha]
                ),
                ['json' => $data, 'query' => ['state' => $state]]
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
     *
     * @see https://gitlab.com/help/api/commits.md#list-merge-requests-associated-with-a-commit
     */
    public function mergeRequests($id, string $sha, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'projects/:id/repository/commits/:sha/merge_requests',
                    [$id, $sha]
                ),
                ['query' => $query]
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
     *
     * @see https://gitlab.com/help/api/commits.md#get-gpg-signature-of-a-commit
     */
    public function getSignature($id, string $sha): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/repository/commits/:sha/signature',
                [$id, $sha]
            ))
            ->json();
    }
}
