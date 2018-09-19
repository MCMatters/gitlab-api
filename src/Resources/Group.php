<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class Group
 *
 * @package McMatters\GitlabApi\Resources
 */
class Group extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(array $query = []): array
    {
        return $this->httpClient->get('groups', ['query' => $query])->json();
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
     */
    public function subGroups($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('groups/{id}/subgroups', $id),
                ['query' => $query]
            )
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
     */
    public function projects($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('groups/{id}/projects', $id),
                ['query' => $query]
            )
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
     */
    public function get($id, array $query = []): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('groups/{id}', $id), ['query' => $query])
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
     */
    public function create(string $name, string $path, array $data = []): array
    {
        return $this->httpClient
            ->post(
                'groups',
                ['json' => ['name' => $name, 'path' => $path] + $data]
            )
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
     */
    public function transferProject($id, $projectId): array
    {
        return $this->httpClient
            ->post($this->encodeUrl(
                'groups/{id}/projects/{projectId}',
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
     */
    public function update($id, array $data): array
    {
        return $this->httpClient
            ->put($this->encodeUrl('groups/{id}', $id), ['json' => $data])
            ->json();
    }

    /**
     * @param int|string $id
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function delete($id): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl('groups/{id}', $id))
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
     */
    public function search(string $keyword, array $query = []): array
    {
        $query['search'] = $keyword;

        return $this->list($query);
    }
}
