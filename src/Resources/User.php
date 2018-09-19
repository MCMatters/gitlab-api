<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

/**
 * Class User
 *
 * @package McMatters\GitlabApi\Resources
 */
class User extends AbstractResource
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
        return $this->httpClient->get('users', ['query' => $query])->json();
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
    public function get(int $id, array $query = []): array
    {
        return $this->httpClient
            ->get("users/{$id}", ['query' => $query])
            ->json();
    }

    /**
     * @param string $email
     * @param string $username
     * @param string $name
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create(
        string $email,
        string $username,
        string $name,
        array $data = []
    ): array {
        return $this->httpClient
            ->post(
                'users',
                [
                    'json' => [
                        'email' => $email,
                        'username' => $username,
                        'name' => $name
                    ] + $data,
                ]
            )
            ->json();
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
            ->put("users/{$id}", ['json' => $data])
            ->json();
    }

    /**
     * @param int $id
     * @param array $query
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function delete(int $id, array $query = []): int
    {
        return $this->httpClient
            ->delete("users/{$id}", ['query' => $query])
            ->getStatusCode();
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
    public function getCurrent(array $query = []): array
    {
        return $this->httpClient->get('user', ['query' => $query])->json();
    }

    /**
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getCurrentStatus(): array
    {
        return $this->httpClient->get('user/status')->json();
    }

    /**
     * @param int|string $idOrUsername
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getStatus($idOrUsername): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'users/{idOrUsername}/status',
                $idOrUsername
            ))
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
     */
    public function setStatusForCurrent(array $data): array
    {
        return $this->httpClient->put('user/status', ['json' => $data])->json();
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
    public function sshKeysForCurrent(array $query = []): array
    {
        return $this->httpClient->get('user/keys', ['query' => $query])->json();
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
    public function sshKeys(int $id, array $query = []): array
    {
        return $this->httpClient
            ->get("users/{$id}/keys", ['query' => $query])
            ->json();
    }

    /**
     * @param int $keyId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getSshKey(int $keyId): array
    {
        return $this->httpClient->get("user/keys/{$keyId}")->json();
    }

    /**
     * @param string $title
     * @param string $key
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createSshKeyForCurrent(string $title, string $key): array
    {
        return $this->httpClient
            ->post('user/keys', ['json' => ['title' => $title, 'key' => $key]])
            ->json();
    }

    /**
     * @param int $id
     * @param string $title
     * @param string $key
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createSshKey(int $id, string $title, string $key): array
    {
        return $this->httpClient
            ->post(
                "users/{$id}/keys",
                ['json' => ['title' => $title, 'key' => $key]]
            )
            ->json();
    }

    /**
     * @param int $keyId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function deleteSshKeyForCurrent(int $keyId): int
    {
        return $this->httpClient->delete("user/keys/{$keyId}")->getStatusCode();
    }

    /**
     * @param int $id
     * @param int $keyId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function deleteSshKey(int $id, int $keyId): int
    {
        return $this->httpClient
            ->delete("users/{$id}/keys/{$keyId}")
            ->getStatusCode();
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
    public function gpgKeysForCurrent(array $query = []): array
    {
        return $this->httpClient
            ->get('user/gpg_keys', ['query' => $query])
            ->json();
    }

    /**
     * @param int $keyId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getGpgKeyForCurrent(int $keyId): array
    {
        return $this->httpClient->get("user/gpg_keys/{$keyId}", $keyId)->json();
    }

    /**
     * @param string $key
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createGpgKeyForCurrent(string $key): array
    {
        return $this->httpClient
            ->post('user/gpg_keys', ['json' => ['key' => $key]])
            ->json();
    }

    /**
     * @param int $keyId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function deleteGpgKeyForCurrent(int $keyId): int
    {
        return $this->httpClient
            ->delete("user/gpg_keys/{$keyId}")
            ->getStatusCode();
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
    public function gpgKeys(int $id, array $query = []): array
    {
        return $this->httpClient
            ->get("users/{$id}/gpg_keys", ['query' => $query])
            ->json();
    }

    /**
     * @param int $id
     * @param int $keyId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getGpgKey(int $id, int $keyId): array
    {
        return $this->httpClient->get("users/{$id}/gpg_keys/{$keyId}")->json();
    }

    /**
     * @param int $id
     * @param string $key
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createGpgKey(int $id, string $key): array
    {
        return $this->httpClient
            ->post("users/{$id}/gpg_keys", ['json' => ['key' => $key]])
            ->json();
    }

    /**
     * @param int $id
     * @param int $keyId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function deleteGpgKey(int $id, int $keyId): int
    {
        return $this->httpClient
            ->delete("users/{$id}/gpg_keys/{$keyId}")
            ->getStatusCode();
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
    public function emailsForCurrent(array $query = []): array
    {
        return $this->httpClient
            ->get('user/emails', ['query' => $query])
            ->json();
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
    public function emails(int $id, array $query = []): array
    {
        return $this->httpClient
            ->get("users/{$id}/emails", ['query' => $query])
            ->json();
    }

    /**
     * @param int $emailId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getEmail(int $emailId): array
    {
        return $this->httpClient->get("user/emails/{$emailId}")->json();
    }

    /**
     * @param string $email
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createEmailForCurrent(string $email): array
    {
        return $this->httpClient
            ->post('user/emails', ['json' => ['email' => $email]])
            ->json();
    }

    /**
     * @param int $id
     * @param string $email
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createEmail(int $id, string $email): array
    {
        return $this->httpClient
            ->post("users/{$id}/emails", ['json' => ['email' => $email]])
            ->json();
    }

    /**
     * @param int $emailId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function deleteEmailForCurrent(int $emailId): int
    {
        return $this->httpClient
            ->delete("user/emails/{$emailId}")
            ->getStatusCode();
    }

    /**
     * @param int $id
     * @param int $emailId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function deleteEmail(int $id, int $emailId): int
    {
        return $this->httpClient
            ->delete("users/{$id}/emails/{$emailId}")
            ->getStatusCode();
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
    public function block(int $id): array
    {
        return $this->httpClient->post("users/{$id}/block")->json();
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
    public function unblock(int $id): array
    {
        return $this->httpClient->post("users/{$id}/unblock")->json();
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
    public function impersonationTokens(int $id, array $query = []): array
    {
        return $this->httpClient
            ->get("users/{$id}/impersonation_tokens", ['query' => $query])
            ->json();
    }

    /**
     * @param int $id
     * @param int $impersonationTokenId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getImpersonationToken(
        int $id,
        int $impersonationTokenId
    ): array {
        return $this->httpClient
            ->get("users/{$id}/impersonation_tokens/{$impersonationTokenId}")
            ->json();
    }

    /**
     * @param int $id
     * @param string $name
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createImpersonationToken(
        int $id,
        string $name,
        array $data = []
    ): array {
        return $this->httpClient
            ->post(
                "users/{$id}/impersonation_tokens",
                ['json' => ['name' => $name] + $data]
            )
            ->json();
    }

    /**
     * @param int $id
     * @param int $impersonationTokenId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function revokeImpersonationToken(
        int $id,
        int $impersonationTokenId
    ): int {
        return $this->httpClient
            ->delete("users/{$id}/impersonation_tokens/{$impersonationTokenId}")
            ->getStatusCode();
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
    public function activities(array $query = []): array
    {
        return $this->httpClient
            ->get('user/activities', ['query' => $query])
            ->json();
    }
}
