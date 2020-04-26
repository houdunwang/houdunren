<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use App\Services\SiteService;
use Modules\Edu\Transformers\Front\SiteResource;

class SiteController extends ApiController
{
    public function get(SiteService $siteService)
    {
        $site = $siteService->getSiteByDomain();
        return $this->json(new SiteResource($site));
    }
}
