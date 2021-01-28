<?php

namespace App\Admin\Models\Bot;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Admin\Models\Bot\Product
 *
 * @property int                             $pid
 * @property int                             $status      0:未发送 1：已发送
 * @property string                          $message
 * @property string                          $product_url 商品后缀url
 * @property string                          $sku
 * @property string                          $site        站点
 * @property string                          $site_url    站点网站统一前缀
 * @property int                             $sid         siteId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Product whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Product wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Product whereProductUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Product whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Product whereSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Product whereSiteUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    const UNKNOW       = 0;
    const IN_STOCK     = 10;
    const OUT_OF_STOCK = 20;
    const DELETE       = 99;

    protected $fillable = [
        'pid',
        'status',
        'message',
        'product_url',
        'sku',
        'sid',
        'site_url',
        'site',
        'max_num',
        'price',
        'currency',
        'name',
    ];
}
