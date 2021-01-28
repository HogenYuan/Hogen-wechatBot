<?php

namespace App\Admin\Controllers\Bot;

use App\Admin\Services\Bot\ProductService;
use App\Admin\Services\Bot\SiteService;
use Illuminate\Http\Request;

class SiteController extends BotBaseController
{
    public function addSite(SiteService $service)
    {
        $res = $service->add();
        if (!$res) {
            return $this->error($res);
        }
        return $this->ok($res);
    }
}
