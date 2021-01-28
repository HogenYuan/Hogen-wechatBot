<?php

namespace App\Admin\Models\Bot;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Admin\Models\Bot\ProductMessage
 *
 * @property int    $Id
 * @property int    $pid
 * @property int    $status 0:未发送 1：已发送
 * @property string $message
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\ProductMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\ProductMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\ProductMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\ProductMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\ProductMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\ProductMessage wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Bot\ProductMessage whereStatus($value)
 * @mixin \Eloquent
 */
class ProductMessage extends Model
{

    protected $fillable = [];
}
