<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Traits;

use function array_key_last, array_merge, count;

/**
 * Class HasAllTrait
 *
 * @package McMatters\GitlabApi\Resources\Traits
 */
trait HasAllTrait
{
    /**
     * @param string $method
     * @param array $args
     *
     * @return array
     */
    protected function fetchAllResources(string $method, array $args = []): array
    {
        $all = [];

        $page = 0;
        $perPage = 100;

        $queryKey = array_key_last($args);

        $args[$queryKey]['per_page'] = $perPage;

        do {
            $args[$queryKey]['page'] = ++$page;

            $data = $this->{$method}(...$args);

            $all[] = $data;
        } while (count($data) === $perPage);

        return array_merge([], ...$all);
    }
}
