<?php

namespace App\Admin\Models\Bot;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Admin\Models\Bot\Site
 *
 * @property int                             $sid
 * @property int                             $status
 * @property int                             $is_vpn   是否需要翻墙
 * @property string                          $site     站点
 * @property string                          $site_url 站点网站统一前缀
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string                          $rule     正则匹配式
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Site newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Site newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Site query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Site whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Site whereIsVpn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Site whereRule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Site whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Site whereSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Site whereSiteUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Site whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Site whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Site extends Model
{
    const STATUS_ONLINE  = 10;
    const STATUS_OFFLINE = 20;
    const STATUS_DELETE  = 99;

    protected $fillable = [];
}
