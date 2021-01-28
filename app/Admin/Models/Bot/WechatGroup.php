<?php

namespace App\Admin\Models\Bot;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Admin\Models\Bot\WechatGroup
 *
 * @property int                             $Id
 * @property string                          $wxid           群id
 * @property int                             $status         10:正常，20：异常，30:满人，99:删除
 * @property string                          $robwxid
 * @property int                             $bid
 * @property string                          $nickname       群昵称
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string                          $master_robwxid 群主wxid
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatGroup whereBid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatGroup whereMasterRobwxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatGroup whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatGroup whereRobwxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatGroup whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\WechatGroup whereWxid($value)
 * @mixin \Eloquent
 */
class WechatGroup extends Model
{
    const GROUP_NORMAL   = 10;
    const GROUP_ABNORMAL = 20;
    const GROUP_FULL     = 30;
    const GROUP_DELETE   = 30;

    protected $fillable = ['id', 'wxid', 'status', 'robwxid', 'bid', 'nickname', 'master_robwxid'];
}
