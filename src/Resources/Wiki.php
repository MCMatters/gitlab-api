<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use InvalidArgumentException;
use const null, true;
use function implode, in_array;

/**
 * Class Wiki
 *
 * @package McMatters\GitlabApi\Resources
 */
class Wiki extends AbstractResource
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
     */
    public function list($id, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('projects/{id}/wikis', $id),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $slug
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get($id, string $slug): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('projects/{id}/wikis/{slug}', [$id, $slug]))
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $title
     * @param string $content
     * @param string $format
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create(
        $id,
        string $title,
        string $content,
        string $format = 'markdown'
    ): array {
        $this->checkFormat($format);

        return $this->httpClient
            ->post(
                $this->encodeUrl('projects/{id}/wikis', $id),
                [
                    'json' => [
                        'title' => $title,
                        'content' => $content,
                        'format' => $format,
                    ],
                ]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $slug
     * @param array $data
     * @param string $format
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function update(
        $id,
        string $slug,
        array $data = ['title' => null, 'content' => null],
        string $format = 'markdown'
    ): array {
        $this->checkFormat($format);

        return $this->httpClient
            ->put(
                $this->encodeUrl('projects/{id}/wikis/{slug}', [$id, $slug]),
                ['json' => ['format' => $format] + $data]
            )
            ->json();
    }

    /**
     * @param int|string $id
     * @param string $slug
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function delete($id, string $slug): int
    {
        return $this->httpClient
            ->delete($this->encodeUrl(
                'projects/{id}/wikis/{slug}',
                [$id, $slug]
            ))
            ->getStatusCode();
    }

    /**
     * @param string $format
     *
     * @throws InvalidArgumentException
     */
    protected function checkFormat(string $format = 'markdown')
    {
        $formats = ['markdown', 'rdoc', 'asciidoc'];

        if (!in_array($format, $formats, true)) {
            throw new InvalidArgumentException(
                'Invalid format. Supported formats: '.implode(', ', $formats)
            );
        }
    }
}
