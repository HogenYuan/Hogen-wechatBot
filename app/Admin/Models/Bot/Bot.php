<?php

namespace App\Admin\Models\Bot;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Admin\Models\Bot\Bot
 *
 * @property int                             $bid
 * @property string                          $robwxid
 * @property int                             $status 10：上线 20：下线 99:删除
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string                          $nickname
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Bot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Bot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Bot query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Bot whereBid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Bot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Bot whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Bot whereRobwxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Bot whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\Bot whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Bot extends Model
{
    const BOT_ONLINE  = 10;
    const BOT_OFFLINE = 20;
    const BOT_DELETE  = 99;

    protected $fillable = ['bid', 'status', 'nickname', 'robwxid'];
}
