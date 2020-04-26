<?php

namespace Modules\Edu\Transformers\Front;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteResource extends JsonResource
{

    public function toArray($request)
    {
        $site =  parent::toArray($request);
        unset($site['config']);
        return $site;
    }
}
