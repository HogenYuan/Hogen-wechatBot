<?php

namespace App\Admin\Models;

use App\Admin\Traits\ModelHelpers;
use DateTimeInterface;

/**
 * Class Model
 *
 * @package App\Admin\Models
 */
class Model extends \Illuminate\Database\Eloquent\Model
{
    use ModelHelpers;

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
