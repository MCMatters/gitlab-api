<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

/**
 * Class User
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class User extends StandaloneResource
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
     * @see https://gitlab.com/help/api/users.md#list-users
     */
    public function list(array $query = []): array
    {
        return $this->httpClient->withQuery($query)->get('users')->json();
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
     * @see https://gitlab.com/help/api/users.md#single-user
     */
    public function get($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('users/:id', $id))
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
     *
     * @see https://gitlab.com/help/api/users.md#user-creation
     */
    public function create(
        string $email,
        string $username,
        string $name,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson([
                    'email' => $email,
                    'username' => $username,
                    'name' => $name,
                ] + $data
            )
            ->post('users')
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
     * @see https://gitlab.com/help/api/users.md#user-modification
     */
    public function update($id, array $data): array
    {
        return $this->httpClient
            ->withJson($data)
            ->put($this->encodeUrl('users/:id', $id))
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
     * @see https://gitlab.com/help/api/users.md#user-deletion
     */
    public function delete($id, array $query = []): int
    {
        return $this->httpClient
            ->withQuery($query)
            ->delete($this->encodeUrl('users/:id', $id))
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
     *
     * @see https://gitlab.com/help/api/users.md#list-current-user-for-normal-users
     * @see https://gitlab.com/help/api/users.md#list-current-user-for-admins
     */
    public function getCurrent(array $query = []): array
    {
        return $this->httpClient->withQuery($query)->get('user')->json();
    }

    /**
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/users.md#user-status
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
     *
     * @see https://gitlab.com/help/api/users.md#get-the-status-of-a-user
     */
    public function getStatus($idOrUsername): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                'users/:id_or_username/status',
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
     *
     * @see https://gitlab.com/help/api/users.md#set-user-status
     */
    public function setStatusForCurrent(array $data): array
    {
        return $this->httpClient->withJson($data)->put('user/status')->json();
    }

    /**
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/users.md#user-counts
     */
    public function getCountsForCurrent(): array
    {
        return $this->httpClient->get('user_counts')->json();
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
     * @see https://gitlab.com/help/api/users.md#list-ssh-keys
     */
    public function sshKeysForCurrent(array $query = []): array
    {
        return $this->httpClient->withQuery($query)->get('user/keys')->json();
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
     * @see https://gitlab.com/help/api/users.md#list-ssh-keys-for-user
     */
    public function sshKeys($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('users/:id/keys', $id))
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
     *
     * @see https://gitlab.com/help/api/users.md#single-ssh-key
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
     *
     * @see https://gitlab.com/help/api/users.md#add-ssh-key
     */
    public function createSshKeyForCurrent(string $title, string $key): array
    {
        return $this->httpClient
            ->withJson(['title' => $title, 'key' => $key])
            ->post('user/keys')
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $title
     * @param string $key
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/users.md#add-ssh-key-for-user
     */
    public function createSshKey($id, string $title, string $key): array
    {
        return $this->httpClient
            ->withJson(['title' => $title, 'key' => $key])
            ->post($this->encodeUrl('users/:id/keys', $id))
            ->json();
    }

    /**
     * @param int $keyId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/users.md#delete-ssh-key-for-current-user
     */
    public function deleteSshKeyForCurrent(int $keyId): int
    {
        return $this->httpClient->delete("user/keys/{$keyId}")->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int $keyId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/users.md#delete-ssh-key-for-given-user
     */
    public function deleteSshKey($id, int $keyId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl('users/:id/keys/:key_id', [$id, $keyId]))
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
     *
     * @see https://gitlab.com/help/api/users.md#list-all-gpg-keys
     */
    public function gpgKeysForCurrent(array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('user/gpg_keys')
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
     *
     * @see https://gitlab.com/help/api/users.md#get-a-specific-gpg-key
     */
    public function getGpgKeyForCurrent(int $keyId): array
    {
        return $this->httpClient->get("user/gpg_keys/{$keyId}")->json();
    }

    /**
     * @param string $key
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/users.md#add-a-gpg-key
     */
    public function createGpgKeyForCurrent(string $key): array
    {
        return $this->httpClient
            ->withJson(['key' => $key])
            ->post('user/gpg_keys')
            ->json();
    }

    /**
     * @param int $keyId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/users.md#delete-a-gpg-key
     */
    public function deleteGpgKeyForCurrent(int $keyId): int
    {
        return $this->httpClient
            ->delete("user/gpg_keys/{$keyId}")
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
     * @see https://gitlab.com/help/api/users.md#list-all-gpg-keys-for-given-user
     */
    public function gpgKeys($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('users/:id/gpg_keys', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $keyId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/users.md#get-a-specific-gpg-key-for-a-given-user
     */
    public function getGpgKey($id, int $keyId): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('users/:id/gpg_keys/:key_id', [$id, $keyId]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $key
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/users.md#add-a-gpg-key-for-a-given-user
     */
    public function createGpgKey($id, string $key): array
    {
        return $this->httpClient
            ->withJson(['key' => $key])
            ->post($this->encodeUrl('users/:id/gpg_keys', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $keyId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/users.md#delete-a-gpg-key-for-a-given-user
     */
    public function deleteGpgKey($id, int $keyId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'users/:id/gpg_keys/:key_id',
                [$id, $keyId]
            ))
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
     *
     * @see https://gitlab.com/help/api/users.md#list-emails
     */
    public function emailsForCurrent(array $query = []): array
    {
        return $this->httpClient->withQuery($query)->get('user/emails')->json();
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
     * @see https://gitlab.com/help/api/users.md#list-emails-for-user
     */
    public function emails(int $id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('users/:id/emails', $id))
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
     *
     * @see https://gitlab.com/help/api/users.md#single-email
     */
    public function getEmailForCurrent(int $emailId): array
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
     *
     * @see https://gitlab.com/help/api/users.md#add-email
     */
    public function createEmailForCurrent(string $email): array
    {
        return $this->httpClient
            ->withJson(['email' => $email])
            ->post('user/emails')
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $email
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/users.md#add-email-for-user
     */
    public function createEmail($id, string $email): array
    {
        return $this->httpClient
            ->withJson(['email' => $email])
            ->post($this->encodeUrl('users/:id/emails', $id))
            ->json();
    }

    /**
     * @param int $emailId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/users.md#delete-email-for-current-user
     */
    public function deleteEmailForCurrent(int $emailId): int
    {
        return $this->httpClient
            ->delete("user/emails/{$emailId}")
            ->getStatusCode();
    }

    /**
     * @param int|string $id
     * @param int $emailId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/users.md#delete-email-for-given-user
     */
    public function deleteEmail($id, int $emailId): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'users/:id/emails/:email_id',
                [$id, $emailId]
            ))
            ->getStatusCode();
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
     * @see https://gitlab.com/help/api/users.md#block-user
     */
    public function block($id): array
    {
        return $this->httpClient
            ->post($this->encodeUrl('users/:id/block', $id))
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
     * @see https://gitlab.com/help/api/users.md#unblock-user
     */
    public function unblock($id): array
    {
        return $this->httpClient
            ->post($this->encodeUrl('users/:id/unblock', $id))
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
     * @see https://gitlab.com/help/api/users.md#get-all-impersonation-tokens-of-a-user
     */
    public function impersonationTokens($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl('users/:id/impersonation_tokens', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $impersonationTokenId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/users.md#get-an-impersonation-token-of-a-user
     */
    public function getImpersonationToken(
        int $id,
        int $impersonationTokenId
    ): array {
        return $this->httpClient
            ->get($this->encodeUrl(
                'users/:id/impersonation_tokens/:impersonation_token_id',
                [$id, $impersonationTokenId]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $name
     * @param array $scopes
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/users.md#create-an-impersonation-token
     */
    public function createImpersonationToken(
        $id,
        string $name,
        array $scopes,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson(['name' => $name, 'scopes' => $scopes] + $data)
            ->post($this->encodeUrl('users/:id/impersonation_tokens', $id))
            ->json();
    }

    /**
     * @param int|string $id
     * @param int $impersonationTokenId
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/users.md#revoke-an-impersonation-token
     */
    public function revokeImpersonationToken(
        int $id,
        int $impersonationTokenId
    ): int {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'users/:id/impersonation_tokens/:impersonation_token_id',
                [$id, $impersonationTokenId]
            ))
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
     *
     * @see https://gitlab.com/help/api/users.md#get-user-activities-admin-only
     */
    public function activities(array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('user/activities')
            ->json();
    }
}
