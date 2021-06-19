<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Traits;

/**
 * Trait MemberTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait MemberTrait
{
    use HasAllTrait;

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
     * @see https://gitlab.com/help/api/members.md#list-all-members-of-a-group-or-project
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(':type/:id/members', [$this->type, $id]))
            ->json();
    }

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
     * @see https://gitlab.com/help/api/members.md#list-all-members-of-a-group-or-project-including-inherited-members
     */
    public function all($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(':type/:id/members/all', [$this->type, $id]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $userId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/members.md#get-a-member-of-a-group-or-project
     */
    public function get($id, int $userId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                ':type/:id/members/:user_id',
                [$this->type, $id, $userId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $userId
     * @param int $accessLevel
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/members.md#get-a-member-of-a-group-or-project
     */
    public function create(
        $id,
        int $userId,
        int $accessLevel,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson([
                    'user_id' => $userId,
                    'access_level' => $accessLevel,
                ] + $data
            )
            ->post($this->encodeUrl(':type/:id/members', [$this->type, $id]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $userId
     * @param int $accessLevel
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/members.md#edit-a-member-of-a-group-or-project
     */
    public function update(
        $id,
        int $userId,
        int $accessLevel,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson(['access_level' => $accessLevel] + $data)
            ->put($this->encodeUrl(
                ':type/:id/members/:user_id',
                [$this->type, $id, $userId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $userId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/members.md#remove-a-member-from-a-group-or-project
     */
    public function delete($id, int $userId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                ':type/:id/members/:user_id',
                [$this->type, $id, $userId]
            ))
            ->getStatusCode();
    }
}
