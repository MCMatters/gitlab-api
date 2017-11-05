<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use InvalidArgumentException;
use const false, null, true;
use function array_filter, implode, in_array;

/**
 * Class Wiki
 *
 * @package McMatters\GitlabApi\Resources
 */
class Wiki extends AbstractResource
{
    /**
     * @param int|string $id
     * @param bool $withContent
     *
     * @return array
     * @throws \McMatters\GitlabApi\Exceptions\ResponseException
     * @throws \McMatters\GitlabApi\Exceptions\RequestException
     */
    public function list($id, bool $withContent = false): array
    {
        return $this->requestGet(
            $this->getUrl($id),
            ['with_content' => (int) $withContent]
        );
    }

    /**
     * @param int|string $id
     * @param string $slug
     *
     * @return array
     * @throws \McMatters\GitlabApi\Exceptions\ResponseException
     * @throws \McMatters\GitlabApi\Exceptions\RequestException
     */
    public function get($id, string $slug): array
    {
        return $this->requestGet($this->getUrl($id, $slug));
    }

    /**
     * @param int|string $id
     * @param string $title
     * @param string $content
     * @param string $format
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws \McMatters\GitlabApi\Exceptions\ResponseException
     * @throws \McMatters\GitlabApi\Exceptions\RequestException
     */
    public function create(
        $id,
        string $title,
        string $content,
        string $format = 'markdown'
    ): array {
        $this->checkFormat($format);

        return $this->requestPost(
            $this->getUrl($id),
            ['title' => $title, 'content' => $content, 'format' => $format]
        );
    }

    /**
     * @param int|string $id
     * @param string $slug
     * @param array $data
     * @param string $format
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws \McMatters\GitlabApi\Exceptions\ResponseException
     * @throws \McMatters\GitlabApi\Exceptions\RequestException
     */
    public function update(
        $id,
        string $slug,
        array $data = ['title' => null, 'content' => null],
        string $format = 'markdown'
    ): array {
        $this->checkFormat($format);

        $data = array_filter($data);

        if (empty($data)) {
            throw new InvalidArgumentException('Title or content must be provided.');
        }

        $data['format'] = $format;

        return $this->requestPut($this->getUrl($id, $slug), $data);
    }

    /**
     * @param int|string $id
     * @param string $slug
     *
     * @return int
     * @throws \McMatters\GitlabApi\Exceptions\RequestException
     */
    public function delete($id, string $slug): int
    {
        return $this->requestDelete($this->getUrl($id, $slug));
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
                'Supported formats are '.implode(', ', $formats)
            );
        }
    }

    /**
     * @param int|string $id
     * @param string|null $slug
     *
     * @return string
     */
    protected function getUrl($id, string $slug = null): string
    {
        $url = "projects/{$this->encode($id)}/wikis";

        return null !== $slug ? "{$url}/{$this->encode($slug)}" : $url;
    }
}
