<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Resources;

use InvalidArgumentException;
use const null;
use function array_filter;

class Label extends AbstractResource
{
    public function list($id)
    {
        $id = $this->encode($id);

        return $this->requestGet("projects/{$id}/labels");
    }

    public function create(
        $id,
        string $name,
        string $color,
        string $description = '',
        int $priority = null
    ) {
        $id = $this->encode($id);

        return $this->requestPost(
            "projects/{$id}/labels",
            [
                'name'        => $name,
                'color'       => $color,
                'description' => $description,
                'priority'    => $priority,
            ]
        );
    }

    public function update($id, string $name, array $data)
    {
        $data = array_filter($data);

        if (empty($data['new_name']) && empty($data['color'])) {
            throw new InvalidArgumentException('new_name or color must be provided.');
        }

        $id = $this->encode($id);
        $data['name'] = $name;

        return $this->requestPut("projects/{$id}/labels", $data);
    }

    public function delete($id, string $name)
    {
        $id = $this->encode($id);

        return $this->requestDelete("projects/{$id}/labels", ['name' => $name]);
    }

    public function subscribe($id, $labelId)
    {
        list($id, $labelId) = $this->encode([$id, $labelId]);

        return $this->requestPost("projects/{$id}/labels/{$labelId}/subscribe");
    }

    public function unsubscribe($id, $labelId)
    {
        list($id, $labelId) = $this->encode([$id, $labelId]);

        return $this->requestPost("projects/{$id}/labels/{$labelId}/unsubscribe");
    }
}
