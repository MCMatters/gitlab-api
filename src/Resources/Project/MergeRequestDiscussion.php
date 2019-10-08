<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Traits\DiscussionTrait;

/**
 * Class MergeRequestDiscussion
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class MergeRequestDiscussion extends ProjectResource
{
    use DiscussionTrait;

    /**
     * @var string
     */
    protected $type = 'merge_requests';

    /**
     * @param int|string $id
     * @param int $iid
     * @param int|string $discussionId
     * @param bool $resolved
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/discussions.md#resolve-a-merge-request-thread
     */
    public function resolve(
        $id,
        int $iid,
        $discussionId,
        bool $resolved = true
    ): array {
        return $this->httpClient
            ->withJson(['resolved' => $resolved])
            ->put($this->encodeUrl(
                'projects/:id/merge_requests/:merge_request_iid/discussions/:discussion_id',
                [$id, $iid, $discussionId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $iid
     * @param int|string $discussionId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/discussions.md#resolve-a-merge-request-thread
     */
    public function unresolve($id, int $iid, $discussionId): array
    {
        return $this->resolve($id, $iid, $discussionId, false);
    }
}
