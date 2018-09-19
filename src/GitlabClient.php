<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi;

use McMatters\GitlabApi\Resources\{
    Branch, BroadcastMessage, CiConfiguration, Commit, CommitDiscussion,
    DeployKey, Deployment, Environment, Event, FeatureFlag, GitignoreTemplate,
    GitlabCiTemplate, Group, GroupAccessRequest, GroupBadge, GroupBoard,
    GroupCustomAttribute, GroupMember, GroupMilestone, GroupVariable, Issue,
    IssueAwardEmoji, IssueBoard, IssueDiscussion, IssueNote, Job, Key, Label,
    LicenseTemplate, Markdown, MergeRequest, MergeRequestAwardEmoji,
    MergeRequestDiscussion, MergeRequestNote, Namespaces, NotificationSetting,
    PageDomain, Pipeline, PipelineSchedule, PipelineTrigger, Project,
    ProjectAccessRequest, ProjectBadge, ProjectCustomAttribute,
    ProjectImportExport, ProjectMember, ProjectMilestone, ProjectSnippet,
    ProjectVariable, ProtectedBranch, Repository, RepositoryFile, Runner,
    Search, Setting, SidekiqMetric, Snippet, SnippetAwardEmoji,
    SnippetDiscussion, SnippetNote, SystemHook, Tag, Todo, User,
    UserCustomAttribute, Version, Wiki
};
use function ucfirst;

/**
 * Class GitlabClient
 */
class GitlabClient
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var array
     */
    protected $resources = [];

    /**
     * GitlabClient constructor.
     *
     * @param string $url
     * @param string $token
     */
    public function __construct(string $url, string $token)
    {
        $this->url = $url;
        $this->token = $token;
    }

    /**
     * @return Branch
     */
    public function branch(): Branch
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return BroadcastMessage
     */
    public function broadcastMessage(): BroadcastMessage
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return CiConfiguration
     */
    public function ciConfiguration(): CiConfiguration
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Commit
     */
    public function commit(): Commit
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return CommitDiscussion
     */
    public function commitDiscussion(): CommitDiscussion
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return DeployKey
     */
    public function deployKey(): DeployKey
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Deployment
     */
    public function deployment(): Deployment
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Environment
     */
    public function environment(): Environment
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Event
     */
    public function event(): Event
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return FeatureFlag
     */
    public function featureFlag(): FeatureFlag
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return GitignoreTemplate
     */
    public function gitignoreTemplate(): GitignoreTemplate
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return GitlabCiTemplate
     */
    public function gitlabCiTemplate(): GitlabCiTemplate
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Group
     */
    public function group(): Group
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return GroupAccessRequest
     */
    public function groupAccessRequest(): GroupAccessRequest
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return GroupBadge
     */
    public function groupBadge(): GroupBadge
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return GroupBoard
     */
    public function groupBoard(): GroupBoard
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return GroupCustomAttribute
     */
    public function groupCustomAttribute(): GroupCustomAttribute
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return GroupMember
     */
    public function groupMember(): GroupMember
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return GroupMilestone
     */
    public function groupMilestone(): GroupMilestone
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return GroupVariable
     */
    public function groupVariable(): GroupVariable
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Issue
     */
    public function issue(): Issue
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return IssueAwardEmoji
     */
    public function issueAwardEmoji(): IssueAwardEmoji
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return IssueBoard
     */
    public function issueBoard(): IssueBoard
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return IssueDiscussion
     */
    public function issueDiscussion(): IssueDiscussion
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return IssueNote
     */
    public function issueNote(): IssueNote
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Job
     */
    public function job(): Job
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Key
     */
    public function key(): Key
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Label
     */
    public function label(): Label
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return LicenseTemplate
     */
    public function licenseTemplate(): LicenseTemplate
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Markdown
     */
    public function markdown(): Markdown
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return MergeRequest
     */
    public function mergeRequest(): MergeRequest
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return MergeRequestAwardEmoji
     */
    public function mergeRequestAwardEmoji(): MergeRequestAwardEmoji
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return MergeRequestDiscussion
     */
    public function mergeRequestDiscussion(): MergeRequestDiscussion
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return MergeRequestNote
     */
    public function mergeRequestNote(): MergeRequestNote
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Namespaces
     */
    public function namespaces(): Namespaces
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return NotificationSetting
     */
    public function notificationSetting(): NotificationSetting
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return PageDomain
     */
    public function pageDomain(): PageDomain
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Pipeline
     */
    public function pipeline(): Pipeline
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return PipelineSchedule
     */
    public function pipelineSchedule(): PipelineSchedule
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return PipelineTrigger
     */
    public function pipelineTrigger(): PipelineTrigger
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Project
     */
    public function project(): Project
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return ProjectAccessRequest
     */
    public function projectAccessRequest(): ProjectAccessRequest
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return ProjectBadge
     */
    public function projectBadge(): ProjectBadge
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return ProjectCustomAttribute
     */
    public function projectCustomAttribute(): ProjectCustomAttribute
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return ProjectImportExport
     */
    public function projectImportExport(): ProjectImportExport
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return ProjectMember
     */
    public function projectMember(): ProjectMember
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return ProjectMilestone
     */
    public function projectMilestone(): ProjectMilestone
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return ProjectSnippet
     */
    public function projectSnippet(): ProjectSnippet
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return ProjectVariable
     */
    public function projectVariable(): ProjectVariable
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return ProtectedBranch
     */
    public function protectedBranch(): ProtectedBranch
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Repository
     */
    public function repository(): Repository
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return RepositoryFile
     */
    public function repositoryFile(): RepositoryFile
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Runner
     */
    public function runner(): Runner
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Search
     */
    public function search(): Search
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Setting
     */
    public function setting(): Setting
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return SidekiqMetric
     */
    public function sidekiqMetric(): SidekiqMetric
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Snippet
     */
    public function snippet(): Snippet
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return SnippetAwardEmoji
     */
    public function snippetAwardEmoji(): SnippetAwardEmoji
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return SnippetDiscussion
     */
    public function snippetDiscussion(): SnippetDiscussion
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return SnippetNote
     */
    public function snippetNote(): SnippetNote
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return SystemHook
     */
    public function systemHook(): SystemHook
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Tag
     */
    public function tag(): Tag
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Todo
     */
    public function todo(): Todo
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return User
     */
    public function user(): User
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return UserCustomAttribute
     */
    public function userCustomAttribute(): UserCustomAttribute
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Version
     */
    public function version(): Version
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @return Wiki
     */
    public function wiki(): Wiki
    {
        return $this->resource(__FUNCTION__);
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    protected function resource(string $name)
    {
        if (!isset($this->resources[$name])) {
            $class = __NAMESPACE__.'\\Resources\\'.ucfirst($name);

            $this->resources[$name] = new $class($this->url, $this->token);
        }

        return $this->resources[$name];
    }
}
