<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Exceptions\{
    InvalidDateException, RequestException, ResponseException
};
use const null;
use function array_key_exists;

/**
 * Class Commit
 *
 * @package McMatters\GitlabApi\Resources
 */
class Commit extends AbstractResource
{
    /**
     * @param int|string $id
     * @param string $ref
     * @param null $since
     * @param null $until
     *
     * @return array
     * @throws InvalidDateException
     * @throws RequestException
     * @throws ResponseException
     */
    public function list(
        $id,
        string $ref = '',
        $since = null,
        $until = null
    ): array {
        return $this->requestGet(
            $this->getUrl($id),
            [
                'ref'   => $ref,
                'since' => $this->transformNullableDate($since),
                'until' => $this->transformNullableDate($until),
            ]
        );
    }

    /**
     * @param int|string $id
     * @param string $sha
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function get($id, string $sha): array
    {
        return $this->requestGet($this->getUrl($id, $sha));
    }

    /**
     * @param int|string $id
     * @param string $branch
     * @param string $message
     * @param array $actions
     * @param string|null $startBranch
     * @param array $author
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function create(
        $id,
        string $branch,
        string $message,
        array $actions,
        string $startBranch = null,
        array $author = []
    ): array {
        return $this->requestPost(
            $this->getUrl($id),
            [
                'branch'         => $branch,
                'commit_message' => $message,
                'start_branch'   => $startBranch,
                'actions'        => $actions,
                'author_email'   => $author['email'] ?? null,
                'author_name'    => $author['name'] ?? null,
            ]
        );
    }

    /**
     * @param int|string $id
     * @param string $sha
     * @param string $branch
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function cherryPick($id, string $sha, string $branch): array
    {
        return $this->requestPost(
            "{$this->getUrl($id, $sha)}/cherry_pick",
            ['branch' => $branch]
        );
    }

    /**
     * @param int|string $id
     * @param string $sha
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function diff($id, string $sha): array
    {
        return $this->requestGet("{$this->getUrl($id, $sha)}/diff");
    }

    /**
     * @param int|string $id
     * @param string $sha
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function comments($id, string $sha): array
    {
        return $this->requestGet("{$this->getUrl($id, $sha)}/comments");
    }

    /**
     * @param int|string $id
     * @param string $sha
     * @param string $comment
     * @param array $file
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function createComment(
        $id,
        string $sha,
        string $comment,
        array $file = ['path' => null, 'line' => null, 'line_type' => 'new']
    ): array {
        return $this->requestPost(
            "{$this->getUrl($id, $sha)}/comments",
            [
                'note'      => $comment,
                'path'      => $file['path'] ?? null,
                'line'      => $file['line'] ?? null,
                'line_type' => $file['line_type'] ?? 'new',
            ]
        );
    }

    /**
     * @param int|string $id
     * @param string $sha
     * @param array $filters
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function status($id, string $sha, array $filters = []): array
    {
        return $this->requestGet(
            "{$this->getUrl($id, $sha)}/statuses",
            $filters
        );
    }

    /**
     * @param int|string $id
     * @param string $sha
     * @param string $state
     * @param array $data
     *
     * @return array
     * @throws RequestException
     * @throws ResponseException
     */
    public function postBuildStatus(
        $id,
        string $sha,
        string $state,
        array $data
    ): array {
        $nameKey = array_key_exists('context', $data) ? 'context' : 'name';

        return $this->requestPost(
            "projects/{$this->encode($id)}/statuses/{$sha}",
            [
                'state'       => $state,
                $nameKey      => $data[$nameKey] ?? null,
                'target_url'  => $data['target_url'] ?? null,
                'description' => $data['description'] ?? null,
                'coverage'    => $data['coverage'] ?? null,
            ]
        );
    }

    /**
     * @param int|string $id
     * @param string|null $sha
     *
     * @return string
     */
    protected function getUrl($id, string $sha = null): string
    {
        $url = "projects/{$this->encode($id)}/repository/commits";

        return null !== $sha ? "{$url}/{$sha}" : $url;
    }
}
