<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use InvalidArgumentException;
use const false, null, true;
use function array_filter;

class Wiki extends AbstractResource
{
    public function list($id, bool $withContent = false)
    {
        $id = $this->encode($id);

        return $this->requestGet(
            "projects/{$id}/wikis",
            ['with_content' => (int) $withContent]
        );
    }

    public function get($id, string $slug)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/wikis/{$slug}");
    }

    public function create($id, string $title, string $content, string $format = 'markdown')
    {
        $this->checkFormat($format);

        $id = $this->encode($id);

        return $this->requestPost(
            "projects/{$id}/wikis",
            ['title' => $title, 'content' => $content, 'format' => $format]
        );
    }

    public function update(
        $id,
        string $slug,
        array $data = ['title' => null, 'content' => null],
        string $format = 'markdown'
    ) {
        $this->checkFormat($format);

        $data = array_filter($data);

        if (empty($data)) {
            throw new InvalidArgumentException('Title or content must be provided.');
        }

        $data['format'] = $format;

        $id = $this->encode($id);

        return $this->requestPut("projects/{$id}/wikis/{$slug}", $data);
    }

    public function delete($id, string $slug)
    {
        $id = $this->encode($id);

        return $this->requestDelete("projects/{$id}/wikis/{$slug}");
    }

    /**
     * @param string $format
     *
     * @throws InvalidArgumentException
     */
    protected function checkFormat(string $format = 'markdown')
    {
        $formats = ['markdown', 'rdoc', 'asciidoc'];

        if (!\in_array($format, $formats, true)) {
            throw new InvalidArgumentException(
                'Supported formats are '.implode(', ', $formats)
            );
        }
    }
}
