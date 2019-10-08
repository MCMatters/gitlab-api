<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Traits;

/**
 * Trait VariableTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait VariableTrait
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
     * @see https://gitlab.com/help/api/project_level_variables.md#list-project-variables
     * @see https://gitlab.com/help/api/group_level_variables.md#list-group-variables
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get($this->encodeUrl(':type/:id/variables', [$this->type, $id]))
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
     * @see https://gitlab.com/help/api/project_level_variables.md#show-variable-details
     * @see https://gitlab.com/help/api/group_level_variables.md#show-variable-details
     */
    public function get($id, string $key): array
    {
        return $this->httpClient
            ->get($this->encodeUrl(
                ':type/:id/variables/:key',
                [$this->type, $id, $key]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $key
     * @param string $value
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/project_level_variables.md#create-variable
     * @see https://gitlab.com/help/api/group_level_variables.md#create-variable
     */
    public function create(
        $id,
        string $key,
        string $value,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson(['key' => $key, 'value' => $value] + $data)
            ->post($this->encodeUrl(':type/:id/variables', [$this->type, $id]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $key
     * @param string $value
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/project_level_variables.md#update-variable
     * @see https://gitlab.com/help/api/group_level_variables.md#update-variable
     */
    public function update(
        $id,
        string $key,
        string $value,
        array $data
    ): array {
        return $this->httpClient
            ->withJson(['value' => $value] + $data)
            ->put($this->encodeUrl(
                ':type/:id/variables/:key',
                [$this->type, $id, $key]
            ))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $key
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     *
     * @see https://gitlab.com/help/api/project_level_variables.md#remove-variable
     * @see https://gitlab.com/help/api/group_level_variables.md#remove-variable
     */
    public function delete($id, string $key): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                ':type/:id/variables/:key',
                [$this->type, $id, $key]
            ))
            ->getStatusCode();
    }
}
