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
