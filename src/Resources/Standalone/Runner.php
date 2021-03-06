<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;
use McMatters\Ticl\Enums\HttpStatusCode;
use Throwable;

use const false;

/**
 * Class Runner
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class Runner extends StandaloneResource
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
     * @see https://gitlab.com/help/api/runners.md#list-owned-runners
     */
    public function list(array $query = []): array
    {
        return $this->httpClient->withQuery($query)->get('runners')->json();
    }

    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/runners.md#list-all-runners
     */
    public function all(array $query = []): array
    {
        return $this->httpClient->withQuery($query)->get('runners/all')->json();
    }

    /**
     * @param int $id
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/runners.md#get-runners-details
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
     *
     * @see https://gitlab.com/help/api/runners.md#update-runners-details
     */
    public function update(int $id, array $data): array
    {
        return $this->httpClient->withJson($data)->put("runners/{$id}")->json();
    }

    /**
     * @param int $id
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/runners.md#remove-a-runner
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
     *
     * @see https://gitlab.com/help/api/runners.md#list-runners-jobs
     */
    public function jobs(int $id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get("runners/{$id}/jobs")
            ->json();
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
     *
     * @see https://gitlab.com/help/api/runners.md#register-a-new-runner
     */
    public function register(string $token, array $data = []): array
    {
        return $this->httpClient
            ->withJson(['token' => $token] + $data)
            ->post('runners')
            ->json();
    }

    /**
     * @param string $token
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/runners.md#delete-a-registered-runner
     */
    public function deleteRegistered(string $token): int
    {
        return $this->httpClient
            ->withJson(['token' => $token])
            ->delete('runners')
            ->getStatusCode();
    }

    /**
     * @param string $token
     *
     * @return bool
     *
     * @see https://gitlab.com/help/api/runners.md#verify-authentication-for-a-registered-runner
     */
    public function verifyRegistered(string $token): bool
    {
        try {
            return HttpStatusCode::OK === $this->httpClient
                    ->withJson(['token' => $token])
                    ->post('runners/verify')
                    ->getStatusCode();
        } catch (Throwable $e) {
            return false;
        }
    }
}
