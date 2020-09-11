<?php

namespace Houdunwang\WeChat\Material;

use Http;

trait Create
{
  public function add(string $type, string $file)
  {
    $api = $this->api . '/material/add_material?access_token=' . $this->token() . '&type=' . $type;

    $response = Http::attach('media', file_get_contents($file), basename($file))
      ->post($api)
      ->json();

    return $this->return($response);
  }
}
