<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\ResourceContexts;

use McMatters\GitlabApi\Resources\Standalone\{
    Application, Avatar, BroadcastMessage, CI, DeployKey, Event, FeatureFlag,
    GeoNode, Import, Issue, IssueStatistic, Key, License, Markdown,
    MergeRequest, Namespaces, NotificationSetting, PageDomain, Runner, Search,
    Setting, SidekiqMetric, Snippet, Statistic, Suggestion, SystemHook, Todo,
    User, Version
};

/**
 * Class StandaloneContext
 *
 * @package McMatters\GitlabApi\ResourceContexts
 */
class StandaloneContext extends Context
{
    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\Application
     */
    public function application(): Application
    {
        return $this->resource(Application::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\Avatar
     */
    public function avatar(): Avatar
    {
        return $this->resource(Avatar::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\BroadcastMessage
     */
    public function broadcastMessage(): BroadcastMessage
    {
        return $this->resource(BroadcastMessage::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\CI
     */
    public function ci(): CI
    {
        return $this->resource(CI::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\DeployKey
     */
    public function deployKey(): DeployKey
    {
        return $this->resource(DeployKey::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\Event
     */
    public function event(): Event
    {
        return $this->resource(Event::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\FeatureFlag
     */
    public function featureFlag(): FeatureFlag
    {
        return $this->resource(FeatureFlag::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\GeoNode
     */
    public function geoNode(): GeoNode
    {
        return $this->resource(GeoNode::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\Import
     */
    public function import(): Import
    {
        return $this->resource(Import::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\Issue
     */
    public function issue(): Issue
    {
        return $this->resource(Issue::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\IssueStatistic
     */
    public function issueStatistic(): IssueStatistic
    {
        return $this->resource(IssueStatistic::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\Key
     */
    public function key(): Key
    {
        return $this->resource(Key::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\License
     */
    public function license(): License
    {
        return $this->resource(License::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\Markdown
     */
    public function markdown(): Markdown
    {
        return $this->resource(Markdown::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\MergeRequest
     */
    public function mergeRequest(): MergeRequest
    {
        return $this->resource(MergeRequest::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\Namespaces
     */
    public function namespaces(): Namespaces
    {
        return $this->resource(Namespaces::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\NotificationSetting
     */
    public function notificationSetting(): NotificationSetting
    {
        return $this->resource(NotificationSetting::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\PageDomain
     */
    public function pageDomain(): PageDomain
    {
        return $this->resource(PageDomain::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\Runner
     */
    public function runner(): Runner
    {
        return $this->resource(Runner::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\Search
     */
    public function search(): Search
    {
        return $this->resource(Search::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\Setting
     */
    public function Setting(): Setting
    {
        return $this->resource(Setting::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\SidekiqMetric
     */
    public function sidekiqMetric(): SidekiqMetric
    {
        return $this->resource(SidekiqMetric::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\Snippet
     */
    public function snippet(): Snippet
    {
        return $this->resource(Snippet::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\Statistic
     */
    public function statistic(): Statistic
    {
        return $this->resource(Statistic::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\Suggestion
     */
    public function suggestion(): Suggestion
    {
        return $this->resource(Suggestion::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\SystemHook
     */
    public function systemHook(): SystemHook
    {
        return $this->resource(SystemHook::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\Todo
     */
    public function todo(): Todo
    {
        return $this->resource(Todo::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\User
     */
    public function user(): User
    {
        return $this->resource(User::class);
    }

    /**
     * @return \McMatters\GitlabApi\Resources\Standalone\Version
     */
    public function version(): Version
    {
        return $this->resource(Version::class);
    }
}
