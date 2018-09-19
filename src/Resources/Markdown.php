<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use const false, null;

/**
 * Class Markdown
 *
 * @package McMatters\GitlabApi\Resources
 */
class Markdown extends AbstractResource
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
     */
    public function render(
        string $text,
        bool $gfm = false,
        string $project = null
    ): array {
        return $this->httpClient
            ->post(
                'markdown',
                [
                    'json' => [
                        'text' => $text,
                        'gfm' => $gfm,
                        'project' => $project,
                    ],
                ]
            )
            ->json();
    }
}
