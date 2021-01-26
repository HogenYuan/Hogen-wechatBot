<?php

namespace App\Admin\Models\Bot;

use Illuminate\Database\Eloquent\Model;

class WechatMessage extends Model
{
    const MESSAGE_TYPE_PERSONAL = 100;
    const MESSAGE_TYPE_GROUP = 200;

    protected $fillable = ['bid', 'status', 'msg', 'type','nickname', 'robwxid', 'msg_type', 'from_wxid','final_from_wxid', 'file_url','final_from_name'];
}
