<?php

namespace App\Admin\Models\Bot;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Admin\Models\Bot\WechatMessage
 *
 * @property int                             $Id
 * @property int                             $bid    机器人ID
 * @property int                             $status 0:未发送 1：已发送
 * @property string                          $msg
 * @property int                             $type
 * @property string                          $nickname
 * @property string                          $robwxid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string                          $msg_type
 * @property string                          $from_wxid
 * @property string                          $final_from_wxid
 * @property string                          $final_from_name
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string                          $file_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatMessage whereBid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatMessage whereFileUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatMessage whereFinalFromName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatMessage whereFinalFromWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatMessage whereFromWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatMessage whereMsg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatMessage whereMsgType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatMessage whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatMessage whereRobwxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatMessage whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatMessage whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatMessage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WechatMessage extends Model
{
    const MESSAGE_TYPE_PERSONAL = 100;
    const MESSAGE_TYPE_GROUP    = 200;

    protected $fillable = [
        'bid',
        'status',
        'msg',
        'type',
        'nickname',
        'robwxid',
        'msg_type',
        'from_wxid',
        'final_from_wxid',
        'file_url',
        'final_from_name',
    ];
}
