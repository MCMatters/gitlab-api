<?php

declare(strict_types = 1);

namespace McMatters\GitlabApi\Enumerators;

/**
 * Interface SearchScope
 *
 * @package McMatters\GitlabApi\Enumerators
 */
interface SearchScope
{
    public const BLOBS = 'blobs';
    public const COMMITS = 'commits';
    public const ISSUES = 'issues';
    public const MERGE_REQUESTS = 'merge_requests';
    public const MILESTONES = 'milestones';
    public const NOTES = 'notes';
    public const PROJECTS = 'projects';
    public const SNIPPET_BLOBS = 'snippet_blobs';
    public const SNIPPET_TITLES = 'snippet_titles';
    public const WIKI_BLOBS = 'wiki_blobs';
}
