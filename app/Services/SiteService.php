<?php

namespace App\Services;

use App\Models\Site;

class SiteService
{
    public function initConfig(Site $site)
    {
        config('app.name', $site['title']);

        config(['mail.default' => config('site.email.transport')]);
        config(['mail.mailers.smtp' =>  config('site.email')]);

        config(['mail.from' => [
            'address' => config('site.email.username'),
            'name' => $site['title']
        ]]);
    }
}
