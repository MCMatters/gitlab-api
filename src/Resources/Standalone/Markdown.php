<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources\Standalone;

use McMatters\GitlabApi\Resources\StandaloneResource;

use const false, null;

/**
 * Class Markdown
 *
 * @package McMatters\GitlabApi\Resources\Standalone
 */
class Markdown extends StandaloneResource
{
    /**
     * @param string $text
     * @param bool $gfm
     * @param string|null $project
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     *
     * @see https://gitlab.com/help/api/markdown.md#render-an-arbitrary-markdown-document
     */
    public function render(
        string $text,
        bool $gfm = false,
        string $project = null
    ): array {
        return $this->httpClient
            ->withJson(['text' => $text, 'gfm' => $gfm, 'project' => $project])
            ->post('markdown')
            ->json();
    }
}
