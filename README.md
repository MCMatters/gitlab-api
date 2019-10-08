## GitLab API PHP client

### Installation

```bash
composer require mcmatters/gitlab-api
```

### Usage

```php
<?php

declare(strict_types = 1);

require 'vendor/autoload.php';

$client = new \McMatters\GitlabApi\GitlabClient('URL', 'TOKEN');

// You can use one of the fifth resource contexts:
// 1. Groups
// 2. Projects
// 3. Standalone
// 4. Users
// 5. Templates
// Each of them you can find on https://gitlab.com/help/api/api_resources.md
$epics = $client->group()->epic()->list(1);
$mergeRequests = $client->project()->mergeRequest()->list(1);
$queueMetrics = $client->standalone()->sidekiqMetric()->queueMetrics();
$starredProjects = $client->user()->project()->listStarred(1);
$dockerTemplates = $client->template()->dockerfile()->list();
```
