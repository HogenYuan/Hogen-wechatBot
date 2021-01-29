<?php

namespace App\Admin\Models\Bot;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pattern
 *
 * @package App\Admin\Models\Bot
 */
class Pattern extends Model
{
    const UNKNOW       = 0;
    const IN_STOCK     = 10;
    const OUT_OF_STOCK = 20;
    const DELETE       = 99;

    protected $fillable = [
        'propduct_id',
        'status',
        'sku',
        'sid',
        'max_num',
        'price',
        'name',
    ];
}
