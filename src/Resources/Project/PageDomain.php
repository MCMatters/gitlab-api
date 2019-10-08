<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Project;

use McMatters\GitlabApi\Resources\ProjectResource;

/**
 * Class PageDomain
 *
 * @package McMatters\GitlabApi\Resources\Project
 */
class PageDomain extends ProjectResource
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
     * @see https://gitlab.com/help/api/pages_domains.md#list-pages-domains
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/:id/pages/domains', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $domain
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pages_domains.md#single-pages-domain
     */
    public function get($id, string $domain): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/:id/pages/domains/:domain',
                [$id, $domain]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $domain
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pages_domains.md#create-new-pages-domain
     */
    public function create($id, string $domain, array $data): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/:id/pages/domains', $id),
                ['json' => ['domain' => $domain] + $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $domain
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pages_domains.md#update-pages-domain
     */
    public function update($id, string $domain, array $data): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/:id/pages/domains/:domain',
                    [$id, $domain]
                ),
                ['json' => $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $domain
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/pages_domains.md#delete-pages-domain
     */
    public function delete($id, string $domain): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/:id/pages/domains/:domain',
                [$id, $domain]
            ))
            ->getStatusCode();
    }
}
