<?php

declare(strict_types=1);

namespace McMatters\GitlabApi\Resources\Group;

use McMatters\GitlabApi\Resources\GroupResource;
use McMatters\GitlabApi\Resources\Traits\MemberTrait;

/**
 * Class Member
 *
 * @package McMatters\GitlabApi\Resources\Group
 */
class Member extends GroupResource
{
    use MemberTrait;

    /**
     * @param int|string $id
     * @param array $query
     *
     * @return array
     */
    public function allInheritedMembers($id, array $query = []): array
    {
        /** @var \McMatters\GitlabApi\Resources\Group\Group $groupResource */
        $groupResource = $this->getContext()->resource(Group::class);

        $groups = $groupResource->allInheritedSubgroups($id);
        $projects = $groupResource->allInheritedProjects($id);

        $members = [];

        foreach ($groups as $group) {
            foreach ($this->fetchAll($group['id'], $query) as $user) {
                $members[$user['id']] = $user;
            }
        }

        $projectMemberResource = $this->getContext()
            ->getClient()
            ->project()
            ->member();

        foreach ($projects as $project) {
            $users = $projectMemberResource->fetchAll($project['id'], $query);

            foreach ($users as $user) {
                $members[$user['id']] = $user;
            }
        }

        return $members;
    }
}
