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
    const BLOBS = 'blobs';
    const COMMITS = 'commits';
    const ISSUES = 'issues';
    const MERGE_REQUESTS = 'merge_requests';
    const MILESTONES = 'milestones';
    const NOTES = 'notes';
    const PROJECTS = 'projects';
    const SNIPPET_BLOBS = 'snippet_blobs';
    const SNIPPET_TITLES = 'snippet_titles';
    const WIKI_BLOBS = 'wiki_blobs';
}
