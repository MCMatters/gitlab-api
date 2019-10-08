<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;

use const null;

/**
 * Class Group
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class Group extends GroupResource
{
    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/groups.md#list-groups
     */
    public function list(array $query = []): array
    {
        return $this->httpClient->withQuery($query)->get('groups')->json();
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
     * @see https://gitlab.com/help/api/groups.md#list-a-groups-subgroups
     */
    public function subGroups($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('groups/:id/subgroups', $id))
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
     * @see https://gitlab.com/help/api/groups.md#list-a-groups-projects
     */
    public function projects($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('groups/:id/projects', $id))
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
     * @see https://gitlab.com/help/api/groups.md#details-of-a-group
     */
    public function get($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('groups/:id', $id))
            ->json();
    }

    /**
     * @param string $name
     * @param string $path
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/groups.md#new-group
     */
    public function create(string $name, string $path, array $data = []): array
    {
        return $this->httpClient
            ->withJson(['name' => $name, 'path' => $path] + $data)
            ->post('groups')
            ->json();
    }

    /**
     * @param int|string $id
     * @param int|string $projectId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/groups.md#transfer-project-to-group
     */
    public function transferProject($id, $projectId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'groups/:id/projects/:project_id',
                [$id, $projectId]
            ))
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
     * @see https://gitlab.com/help/api/groups.md#update-group
     */
    public function update($id, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl('groups/:id', $id))
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
     * @see https://gitlab.com/help/api/groups.md#remove-group
     */
    public function delete($id): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl('groups/:id', $id))
            ->getStatusCode();
    }

    /**
     * @param string $keyword
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/groups.md#search-for-group
     */
    public function search(string $keyword, array $query = []): array
    {
        return $this->list(['search' => $keyword] + $query);
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
     * @see https://gitlab.com/help/api/groups.md#sync-group-with-ldap-core-only
     */
    public function ldapSync($id): array
    {
        return $this->httpClient
            ->post($this->encodeUrl('groups/:id/ldap_sync', $id))
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
     * @see https://gitlab.com/help/api/groups.md#add-ldap-group-link-core-only
     */
    public function createLdapLink($id, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->post($this->encodeUrl('groups/:id/ldap_group_links', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param mixed $cn
     * @param mixed $provider
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/groups.md#delete-ldap-group-link-core-only
     */
    public function deleteLdapLink($id, $cn, $provider = null): int
    {
        $url = null !== $provider
            ? $this->encodeUrl(
                'groups/:id/ldap_group_links/:provider/:cn',
                [$id, $provider, $cn]
            )
            : $this->encodeUrl(
                'groups/:id/ldap_group_links/:cn',
                [$id, $cn]
            );

        return $this->httpClient
            ->delete($url)
            ->getStatusCode();
    }
}
