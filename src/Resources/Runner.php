<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class Runner
 *
 * @package McMatters\GitlabApi\Resources
 */
class Runner extends AbstractResource
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
        return $this->httpClient->get('runners', ['query' => $query])->json();
    }

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
            ->get('runners/all', ['query' => $query])
            ->json();
    }

    /**
     * @param int $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(int $id): array
    {
        return $this->httpClient->get("runners/{$id}")->json();
    }

    /**
     * @param int $id
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update(int $id, array $data): array
    {
        return $this->httpClient
            ->put("runners/{$id}", ['json' => $data])
            ->json();
    }

    /**
     * @param int $id
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function delete(int $id): int
    {
        return $this->httpClient->delete("runners/{$id}")->getStatusCode();
    }

    /**
     * @param int $id
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function listJobs(int $id, array $query = []): array
    {
        return $this->httpClient
            ->get("runners/{$id}", ['query' => $query])
            ->json();
    }

    /**
     * @param int|string $id
     *
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function listFromProject($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/runners', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $runnerId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function enableInProject($id, int $runnerId): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/runners', $id),
                ['json' => ['runner_id' => $runnerId]]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $runnerId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function disableFromProject($id, int $runnerId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/{id}/runners/{runnerId}',
                [$id, $runnerId]
            ))
            ->getStatusCode();
    }

    /**
     * @param string $token
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function register(string $token, array $data = []): array
    {
        return $this->httpClient
            ->post('runners', ['json' => ['token' => $token] + $data])
            ->json();
    }

    /**
     * @param string $token
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function deleteRegistered(string $token): int
    {
        return $this->httpClient
            ->delete('runners', ['form' => ['token' => $token]])
            ->getStatusCode();
    }

    /**
     * @param string $token
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function verifyRegistered(string $token): int
    {
        return $this->httpClient
            ->post('runners/verify', ['form' => ['token' => $token]])
            ->getStatusCode();
    }
}
