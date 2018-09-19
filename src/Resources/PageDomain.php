<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

class PageDomain extends AbstractResource
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
    public function all(array $query = []): array
    {
        return $this->httpClient
            ->get('pages/domains', ['query' => $query])
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
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/pages/domains', $id),
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
     */
    public function get($id, string $domain): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'projects/{id}/pages/domains/{domain}',
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
     */
    public function create($id, string $domain, array $data = []): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/pages/domains', $id),
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
     */
    public function update($id, string $domain, array $data): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'projects/{id}/pages/domains/{domain}',
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
     */
    public function delete($id, string $domain): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/{id}/pages/domains/{domain}',
                [$id, $domain]
            ))
            ->getStatusCode();
    }
}
