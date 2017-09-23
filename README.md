[![StyleCI](https://styleci.io/repos/103454695/shield?branch=develop)](https://styleci.io/repos/103454695)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/9e2e838e3f864e209f2b0c380fbfb02f)](https://www.codacy.com/app/flori.buechner90/Timeline?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Affenpilot/Timeline&amp;utm_campaign=Badge_Grade)


# Affenpilot Timeline

This is a basic timeline module for Laravel.

## Installation

Add the following line in the providers array in 'config\app.php':

```PHP
...

'providers' => [
    ...
    Affenpilot\Timeline\TimelineServiceProvider::class
    ...
]

...
```

Publish and migrate:

    php artisan vendor:publish --provider="Affenpilot\Timeline\TimelineServiceProvider"

## Usage

```PHP
<?php

namespace App;

use Affenpilot\Timeline\HasPosts;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasPosts;
}
```
