<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;
use McMatters\GitlabApi\Resources\Resource;
use McMatters\GitlabApi\Resources\Traits\HasAllTrait;

/**
 * Class Project
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class Project extends ProjectResource
{
    use HasAllTrait;

    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/projects.md#list-all-projects
     */
    public function list(array $query = []): array
    {
        return $this->httpClient->withQuery($query)->get('projects')->json();
    }

    /**
     * @param array $query
     *
     * @return array
     */
    public function all(array $query = []): array
    {
        return $this->fetchAllResources('list', [$query]);
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
     * @see https://gitlab.com/help/api/projects.md#get-single-project
     */
    public function get($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id', $id))
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
     * @see https://gitlab.com/help/api/projects.md#get-project-users
     */
    public function users($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/users', $id))
            ->json();
    }

    /**
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/projects.md#create-project
     */
    public function create(array $data): array
    {
        return $this->httpClient->withJson($data)->post('projects')->json();
    }

    /**
     * @param int $userId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/projects.md#create-project-for-user
     */
    public function createForUser(int $userId, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->post("projects/user/{$$userId}")
            ->json();
    }

    /**
     * @param int|string $id
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/projects.md#edit-project
     */
    public function update($id, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl('projects/:id', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int|string $namespace
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/projects.md#fork-project
     */
    public function fork($id, $namespace, array $data = []): array
    {
        return $this->httpClient
            ->withJson(['namespace' => $namespace] + $data)
            ->post($this->encodeUrl('projects/:id/fork', $id))
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
     * @see https://gitlab.com/help/api/projects.md#list-forks-of-a-project
     */
    public function forks($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/forks', $id))
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
     *
     * @see https://gitlab.com/help/api/projects.md#star-a-project
     */
    public function star($id): array
    {
        return $this->httpClient
            ->post($this->encodeUrl('projects/:id/star', $id))
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
     *
     * @see https://gitlab.com/help/api/projects.md#unstar-a-project
     */
    public function unstar($id): array
    {
        return $this->httpClient
            ->post($this->encodeUrl('projects/:id/unstar', $id))
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
     * @see https://gitlab.com/help/api/projects.md#list-starrers-of-a-project
     */
    public function starrers($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/starrers', $id))
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
     *
     * @see https://gitlab.com/help/api/projects.md#languages
     */
    public function languages($id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('projects/:id/languages', $id))
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
     *
     * @see https://gitlab.com/help/api/projects.md#archive-a-project
     */
    public function archive($id): array
    {
        return $this->httpClient
            ->post($this->encodeUrl('projects/:id/archive', $id))
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
     *
     * @see https://gitlab.com/help/api/projects.md#unarchive-a-project
     */
    public function unarchive($id): array
    {
        return $this->httpClient
            ->post($this->encodeUrl('projects/:id/unarchive', $id))
            ->json();
    }

    /**
     * @param int|string $id
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/projects.md#remove-project
     */
    public function delete($id): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl('projects/:id', $id))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param string|resource $file
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/projects.md#upload-a-file
     */
    public function uploadFile($id, $file): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/:id/uploads', $id),
                ['form' => ['file' => $file]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int|string $groupId
     * @param int $groupAccess
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/projects.md#share-project-with-group
     */
    public function share(
        $id,
        $groupId,
        int $groupAccess,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson([
                    'group_id' => $groupId,
                    'group_access' => $groupAccess,
                ] + $data
            )
            ->post($this->encodeUrl('projects/:id/share', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int|string $groupId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/projects.md#delete-a-shared-project-link-within-a-group
     */
    public function unshare($id, $groupId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/share/:group_id',
                [$id, $groupId]
            ))
            ->getStatusCode();
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
     * @see https://gitlab.com/help/api/projects.md#list-project-hooks
     */
    public function hooks($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/hooks', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $url
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/projects.md#add-project-hook
     */
    public function createHook($id, string $url, array $data = []): array
    {
        return $this->httpClient
            ->withJson(['url' => $url] + $data)
            ->post($this->encodeUrl('projects/:id/hooks', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $hookId
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/projects.md#edit-project-hook
     */
    public function updateHook($id, int $hookId, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl('projects/:id/hooks/:hook_id', [$id, $hookId]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $hookId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/projects.md#delete-project-hook
     */
    public function deleteHook($id, int $hookId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/hooks/:hook_id',
                [$id, $hookId]
            ))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int|string $forkedFromId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/projects.md#create-a-forked-fromto-relation-between-existing-projects
     */
    public function createForkedRelation($id, $forkedFromId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'projects/:id/fork/:forked_from_id',
                [$id, $forkedFromId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/projects.md#delete-an-existing-forked-from-relationship
     */
    public function deleteForkedRelation($id): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl('projects/:id/fork', $id))
            ->getStatusCode();
    }

    /**
     * @param string $search
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/projects.md#search-for-projects-by-name
     */
    public function search(string $search, array $query = []): array
    {
        return $this->list(['search' => $search] + $query);
    }

    /**
     * @param int|string $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/projects.md#start-the-housekeeping-task-for-a-project
     */
    public function startHousekeeping($id): array
    {
        return $this->httpClient
            ->post($this->encodeUrl('projects/:id/housekeeping', $id))
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
     * @see https://gitlab.com/help/api/projects.md#get-project-push-rules
     */
    public function pushRules($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/push_rule', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/projects.md#add-project-push-rule
     */
    public function createPushRule($id, array $data = []): array
    {
        return $this->httpClient
            ->withJson($data)
            ->post($this->encodeUrl('projects/:id/push_rule', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/projects.md#edit-project-push-rule
     */
    public function updatePushRule($id, array $data = []): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl('projects/:id/push_rule', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param array $query
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/projects.md#delete-project-push-rule
     */
    public function deletePushRule($id, array $query = []): int
    {
        return $this->httpClient
            ->withQuery($query)
            ->delete($this->encodeUrl('projects/:id/push_rule', $id))
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int|string $namespace
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/projects.md#transfer-a-project-to-a-new-namespace
     */
    public function transfer($id, $namespace): array
    {
        return $this->httpClient
            ->withJson(['namespace' => $namespace])
            ->put($this->encodeUrl('projects/:id/transfer', $id))
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
     *
     * @see https://gitlab.com/help/api/projects.md#start-the-pull-mirroring-process-for-a-project-starter
     */
    public function startPullMirroring($id): array
    {
        return $this->httpClient
            ->post($this->encodeUrl('projects/:id/mirror/pull', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param array $query
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/projects.md#download-snapshot-of-a-git-repository
     */
    public function downloadSnapshot($id, array $query = []): string
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('projects/:id/snapshot', $id))
            ->getBody();
    }
}
