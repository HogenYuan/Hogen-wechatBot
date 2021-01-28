<?php

namespace App\Admin\Controllers\Bot;

use App\Admin\Services\Bot\ProductService;
use Illuminate\Http\Request;

class ProductController extends BotBaseController
{
    public function getProduct(Request $request, ProductService $service)
    {
        $id = $request->get('pid', 1);
        $res = $service->getProduct($id);
        if (!$res) {
            return $this->error($res);
        }
        return $this->ok($res);
    }
}
