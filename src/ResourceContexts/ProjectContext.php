<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\ResourceContexts;

use McMatters\GitlabApi\Resources\Project\{
    AccessRequest, Badge, Branch, Cluster, Commit, CommitDiscussion,
    ContainerRegistry, CustomAttribute, Dependency, DeployKey, Deployment,
    Environment, Event, Export, Import, Issue, IssueAwardEmoji, IssueBoard,
    IssueDiscussion, IssueLink, IssueNote, IssueResourceLabelEvent,
    IssueStatistic, Job, Label, ManagedLicense, Member, MergeRequest,
    MergeRequestApproval, MergeRequestAwardEmoji, MergeRequestDiscussion,
    MergeRequestNote, MergeRequestResourceLabelEvent, Milestone,
    NotificationSetting, Package, PageDomain, Pipeline, PipelineSchedule,
    PipelineTrigger, Project, ProtectedBranch, ProtectedTag, Release,
    ReleaseLink, Repository, RepositoryFile, RepositorySubmodule, Runner,
    Search, Service, Snippet, SnippetAwardEmoji, SnippetDiscussion, SnippetNote,
    Tag, Template, Variable, Vulnerability, Wiki
};

/**
 * Class ProjectContext
 *
 * @package McMatters\GitlabApi\ResourceContexts
 */
class ProjectContext extends Context
{
    /**
     * @return \McMatters\GitlabApi\Resources\Project\AccessRequest
     */
    public function accessRequest(): AccessRequest
    {
        return $this->resource(AccessRequest::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Badge
     */
    public function badge(): Badge
    {
        return $this->resource(Badge::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Branch
     */
    public function branch(): Branch
    {
        return $this->resource(Branch::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Cluster
     */
    public function cluster(): Cluster
    {
        return $this->resource(Cluster::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Commit
     */
    public function commit(): Commit
    {
        return $this->resource(Commit::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\CommitDiscussion
     */
    public function commitDiscussion(): CommitDiscussion
    {
        return $this->resource(CommitDiscussion::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\ContainerRegistry
     */
    public function containerRegistry(): ContainerRegistry
    {
        return $this->resource(ContainerRegistry::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\CustomAttribute
     */
    public function customAttribute(): CustomAttribute
    {
        return $this->resource(CustomAttribute::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Dependency
     */
    public function dependency(): Dependency
    {
        return $this->resource(Dependency::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\DeployKey
     */
    public function deployKey(): DeployKey
    {
        return $this->resource(DeployKey::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Deployment
     */
    public function deployment(): Deployment
    {
        return $this->resource(Deployment::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Environment
     */
    public function environment(): Environment
    {
        return $this->resource(Environment::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Event
     */
    public function event(): Event
    {
        return $this->resource(Event::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Export
     */
    public function export(): Export
    {
        return $this->resource(Export::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Import
     */
    public function import(): Import
    {
        return $this->resource(Import::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Issue
     */
    public function issue(): Issue
    {
        return $this->resource(Issue::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\IssueAwardEmoji
     */
    public function issueAwardEmoji(): IssueAwardEmoji
    {
        return $this->resource(IssueAwardEmoji::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\IssueBoard
     */
    public function issueBoard(): IssueBoard
    {
        return $this->resource(IssueBoard::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\IssueDiscussion
     */
    public function issueDiscussion(): IssueDiscussion
    {
        return $this->resource(IssueDiscussion::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\IssueLink
     */
    public function issueLink(): IssueLink
    {
        return $this->resource(IssueLink::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\IssueNote
     */
    public function issueNote(): IssueNote
    {
        return $this->resource(IssueNote::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\IssueResourceLabelEvent
     */
    public function issueResourceLabelEvent(): IssueResourceLabelEvent
    {
        return $this->resource(IssueResourceLabelEvent::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\IssueStatistic
     */
    public function issueStatistic(): IssueStatistic
    {
        return $this->resource(IssueStatistic::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Job
     */
    public function job(): Job
    {
        return $this->resource(Job::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Label
     */
    public function label(): Label
    {
        return $this->resource(Label::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\ManagedLicense
     */
    public function managedLicense(): ManagedLicense
    {
        return $this->resource(ManagedLicense::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Member
     */
    public function member(): Member
    {
        return $this->resource(Member::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\MergeRequest
     */
    public function mergeRequest(): MergeRequest
    {
        return $this->resource(MergeRequest::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\MergeRequestApproval
     */
    public function mergeRequestApproval(): MergeRequestApproval
    {
        return $this->resource(MergeRequestApproval::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\MergeRequestAwardEmoji
     */
    public function mergeRequestAwardEmoji(): MergeRequestAwardEmoji
    {
        return $this->resource(MergeRequestAwardEmoji::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\MergeRequestDiscussion
     */
    public function mergeRequestDiscussion(): MergeRequestDiscussion
    {
        return $this->resource(MergeRequestDiscussion::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\MergeRequestNote
     */
    public function mergeRequestNote(): MergeRequestNote
    {
        return $this->resource(MergeRequestNote::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\MergeRequestResourceLabelEvent
     */
    public function mergeRequestResourceLabelEvent(): MergeRequestResourceLabelEvent
    {
        return $this->resource(MergeRequestResourceLabelEvent::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Milestone
     */
    public function milestone(): Milestone
    {
        return $this->resource(Milestone::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\NotificationSetting
     */
    public function notificationSetting(): NotificationSetting
    {
        return $this->resource(NotificationSetting::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Package
     */
    public function package(): Package
    {
        return $this->resource(Package::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\PageDomain
     */
    public function pageDomain(): PageDomain
    {
        return $this->resource(PageDomain::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Pipeline
     */
    public function pipeline(): Pipeline
    {
        return $this->resource(Pipeline::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\PipelineSchedule
     */
    public function pipelineSchedule(): PipelineSchedule
    {
        return $this->resource(PipelineSchedule::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\PipelineTrigger
     */
    public function pipelineTrigger(): PipelineTrigger
    {
        return $this->resource(PipelineTrigger::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Project
     */
    public function project(): Project
    {
        return $this->resource(Project::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\ProtectedBranch
     */
    public function protectedBranch(): ProtectedBranch
    {
        return $this->resource(ProtectedBranch::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\ProtectedTag
     */
    public function protectedTag(): ProtectedTag
    {
        return $this->resource(ProtectedTag::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Release
     */
    public function release(): Release
    {
        return $this->resource(Release::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\ReleaseLink
     */
    public function releaseLink(): ReleaseLink
    {
        return $this->resource(ReleaseLink::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Repository
     */
    public function repository(): Repository
    {
        return $this->resource(Repository::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\RepositoryFile
     */
    public function repositoryFile(): RepositoryFile
    {
        return $this->resource(RepositoryFile::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\RepositorySubmodule
     */
    public function repositorySubmodule(): RepositorySubmodule
    {
        return $this->resource(RepositorySubmodule::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Runner
     */
    public function runner(): Runner
    {
        return $this->resource(Runner::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Search
     */
    public function search(): Search
    {
        return $this->resource(Search::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Service
     */
    public function service(): Service
    {
        return $this->resource(Service::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Snippet
     */
    public function snippet(): Snippet
    {
        return $this->resource(Snippet::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\SnippetAwardEmoji
     */
    public function snippetAwardEmoji(): SnippetAwardEmoji
    {
        return $this->resource(SnippetAwardEmoji::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\SnippetDiscussion
     */
    public function snippetDiscussion(): SnippetDiscussion
    {
        return $this->resource(SnippetDiscussion::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\SnippetNote
     */
    public function snippetNote(): SnippetNote
    {
        return $this->resource(SnippetNote::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Tag
     */
    public function tag(): Tag
    {
        return $this->resource(Tag::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Template
     */
    public function template(): Template
    {
        return $this->resource(Template::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Variable
     */
    public function variable(): Variable
    {
        return $this->resource(Variable::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Vulnerability
     */
    public function vulnerability(): Vulnerability
    {
        return $this->resource(Vulnerability::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Project\Wiki
     */
    public function wiki(): Wiki
    {
        return $this->resource(Wiki::class);
    }
}
