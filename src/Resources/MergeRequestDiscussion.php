<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use McMatters\GitlabApi\Resources\Traits\Api\DiscussionTrait;

/**
 * Class MergeRequestDiscussion
 *
 * @package McMatters\GitlabApi\Resources
 */
class MergeRequestDiscussion extends AbstractResource
{
    use DiscussionTrait;

    /**
     * @var string
     */
    protected $type = 'merge_requests';

    /**
     * @param int|string $id
     * @param int $iid
     * @param int $discussionId
     * @param bool $resolved
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function resolve(
        $id,
        int $iid,
        $discussionId,
        bool $resolved
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/{id}/merge_requests/{iid}/discussions/{discussionId}',
                    [$id, $iid, $discussionId]
                ),
                ['json' => ['resolved' => $resolved]]
            )
            ->json();
    }
}
