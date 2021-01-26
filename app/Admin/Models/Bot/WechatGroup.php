<?php

namespace App\Admin\Models\Bot;

use Illuminate\Database\Eloquent\Model;

class WechatGroup extends Model
{
    const GROUP_NORMAL = 10;
    const GROUP_ABNORMAL = 20;
    const GROUP_FULL = 30;
    const GROUP_DELETE = 30;

    protected $fillable = ['id','wxid','status','robwxid','bid','nickname','master_robwxid'];
}
