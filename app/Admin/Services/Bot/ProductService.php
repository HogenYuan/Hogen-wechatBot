<?php

namespace App\Admin\Services\Bot;

use App\Admin\Models\Bot\Product;
use App\Admin\Models\Bot\Site;
use App\Admin\Services\BaseService;
use Exception;

class ProductService extends BaseService
{
    public function getProduct($id)
    {
        $productM = new Product();
        //        $siteM     = new Site();
        //        $sidToRule = [];

        //        $siteData = $siteM->where('status', Site::STATUS_ONLINE)
        //            ->select('rule,sid')
        //            ->get()
        //            ->toArray();
        //        foreach ($siteData as $site) {
        //            $sidToRule[$site['sid']] = $site['rule'];
        //        }

        $productData = $productM->where([
            'pid'     => $id,
            'is_work' => 1,
        ])->get()->toArray();

        foreach ($productData as $product) {
            //            $url = str_replace('SKU_REPELACE', $product['sku'], $sidToRule[$product['sid']]);

            $url  = $product['product_url'];
            $host = parse_url($url)['host'];

            //TODO www.macys.com
            $header = [
                //                'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
                'Host: ' . $host,
                'User-Agent: Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; 4399Box.560; .NET4.0C; .NET4.0E)',
                "Accept: */*",
                "Accept-Encoding: gzip, deflate, br",
            ];
            $return = $this->_curl($url, $header);
            if (!$return['ack']) {
                throw new Exception();
            }
            $content = $return['result'];
            //            dd($content);
            preg_match_all("/window\.\_\_INITIAL_STATE\_\_([\d\D]*?)\<\/script\>/", $content, $matchs);
            if (empty($matchs) || empty($matchs[0])) {
                //TODO 日志
                throw new Exception();
            }
            $matchData = preg_replace("/\s|　/", "", $matchs[0]);
            if (empty($matchData[0])) {
                //TODO 日志
                throw new Exception();
            }
            $matchData = ltrim($matchData[0], 'window.__INITIAL_STATE__=');
            $matchData = rtrim($matchData, ';</script>');
            $matchData = json_decode($matchData, true);

            $matchData['_PDP_BOOTSTRAP_DATA'] = json_decode($matchData['_PDP_BOOTSTRAP_DATA'], true);

            $checkField = [
                'product_name'  => 'name',
                'product_price' => 'price',
            ];
            $insertData = [];

            $pdpBootstrapData = $matchData['_PDP_BOOTSTRAP_DATA'];
            $utagData         = $pdpBootstrapData['utagData'];
            $product          = $pdpBootstrapData['product'];

            $patternList = $product['traits']['colors']['colorMap'];
            dd($matchData);

            $insertData['sku']      = $product['id'];
            $insertData['currency'] = $pdpBootstrapData['context']['currencyCode'];
            if ($product['availability']['available']) {
                $insertData['status'] = Product::IN_STOCK;
            } else {
                $insertData['status'] = Product::OUT_OF_STOCK;
            }


            foreach ($checkField as $key => $field) {
                if (empty($utagData[$key])) {
                    //TODO 日志
                    dd($utagData);
                    throw new Exception();
                    continue;
                }
                $insertData[$field] = $utagData[$key][0];
                //TODO 遍历patternList
                foreach ($patternList as $pattern) {
                    //TODO 添加到pattern表 比较有没有添加
                    $getPatternList[] = [];
                }
                //TODO 更新到product表
            }

            dd($utagData);
        }
    }

    public function getProxy($url)
    {
        $context = [
            'http' => [
                'method' => "GET",
                'header' => "Host: " . $url . "\r\n" .
                    //                    "Accept-language: zh-cn\r\n" .
                    "User-Agent: Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; 4399Box.560; .NET4.0C; .NET4.0E)\r\n" .
                    "Accept: *//*\r\n" .
                    "Accept-Encoding: gzip, deflate, br",
            ],
        ];
        $context = stream_context_create($context);
        return $context;


        //            $auth = base64_encode("LOGIN:PASSWORD");   //LOGIN:PASSWORD 这里是代理服务器的账户名及密码
        //            $context = [
        //                'http' => [
        //                    'proxy'           => 'tcp://35.226.62.64:80',
        ////                    'proxy' => 'tcp://192.168.0.2:3128',  //这里设置你要使用的代理ip及端口号
        //                    'request_fulluri' => true,
        //                    'header' => "Proxy-Authorization: Basic $auth",
        //                ],
        //            ];
        //            $context = stream_context_create($context);
        //        $content = file_get_contents($url, false, $context);
        //        return $context;
    }
}
