<?php

namespace App\Admin\Models\Bot;

use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    const BOT_ONLINE = 10;
    const BOT_OFFLINE = 20;
    const BOT_DELETE = 99;

    protected $fillable = ['bid', 'status','nickname','robwxid'];
}
