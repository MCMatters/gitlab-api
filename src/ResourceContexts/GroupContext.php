<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\ResourceContexts;

use McMatters\GitlabApi\Resources\Group\{
    AccessRequest, Badge, ContainerRegistry, CustomAttribute, Epic,
    EpicDiscussion, EpicIssue, EpicLink, EpicNote, EpicResourceLabelEvent,
    Group, Issue, IssueBoard, IssueStatistic, Label, Member, MergeRequest,
    Milestone, NotificationSetting, Search, Variable
};

/**
 * Class GroupContext
 *
 * @package McMatters\GitlabApi\ResourceContexts
 */
class GroupContext extends Context
{
    /**
     * @return \McMatters\GitlabApi\Resources\Group\AccessRequest
     */
    public function accessRequest(): AccessRequest
    {
        return $this->resource(AccessRequest::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\Badge
     */
    public function badge(): Badge
    {
        return $this->resource(Badge::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\ContainerRegistry
     */
    public function containerRegistry(): ContainerRegistry
    {
        return $this->resource(ContainerRegistry::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\CustomAttribute
     */
    public function customAttribute(): CustomAttribute
    {
        return $this->resource(CustomAttribute::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\Epic
     */
    public function epic(): Epic
    {
        return $this->resource(Epic::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\EpicDiscussion
     */
    public function epicDiscussion(): EpicDiscussion
    {
        return $this->resource(EpicDiscussion::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\EpicIssue
     */
    public function epicIssue(): EpicIssue
    {
        return $this->resource(EpicIssue::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\EpicLink
     */
    public function epicLink(): EpicLink
    {
        return $this->resource(EpicLink::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\EpicNote
     */
    public function epicNote(): EpicNote
    {
        return $this->resource(EpicNote::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\EpicResourceLabelEvent
     */
    public function epicResourceLabelEvent(): EpicResourceLabelEvent
    {
        return $this->resource(EpicResourceLabelEvent::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\Group
     */
    public function group(): Group
    {
        return $this->resource(Group::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\Issue
     */
    public function issue(): Issue
    {
        return $this->resource(Issue::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\IssueBoard
     */
    public function issueBoard(): IssueBoard
    {
        return $this->resource(IssueBoard::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\IssueStatistic
     */
    public function issueStatistic(): IssueStatistic
    {
        return $this->resource(IssueStatistic::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\Label
     */
    public function label(): Label
    {
        return $this->resource(Label::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\Member
     */
    public function member(): Member
    {
        return $this->resource(Member::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\MergeRequest
     */
    public function mergeRequest(): MergeRequest
    {
        return $this->resource(MergeRequest::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\Milestone
     */
    public function milestone(): Milestone
    {
        return $this->resource(Milestone::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\NotificationSetting
     */
    public function notificationSetting(): NotificationSetting
    {
        return $this->resource(NotificationSetting::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\Search
     */
    public function search(): Search
    {
        return $this->resource(Search::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Group\Variable
     */
    public function variable(): Variable
    {
        return $this->resource(Variable::class);
    }
}
