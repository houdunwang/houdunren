<?php

namespace App\Services;

use App\Models\ArticleConfig;
use App\Models\Site;
use Browser;
use View;

class ArticleService
{
  public function init(Site $site)
  {
    $this->template($site);
    $this->config($site);
  }

  public function template(Site $site)
  {
    $template =  base_path('templates/' . $site->template->name . '/' . (Browser::isDesktop() ? 'pc' : 'phone'));
    View::addLocation($template);
  }

  public function config(Site $site)
  {
    $articleConfig = ArticleConfig::where('site_id', $site->id)->first();
    config(['article' => $articleConfig->config ?? []]);
  }
}
