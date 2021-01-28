<?php

namespace App\Admin\Models;

/**
 * App\Admin\Models\ConfigCategory
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Admin\Models\Config[] $configs
 * @property-read int|null $configs_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Model filter(\App\Admin\Filters\Filter $filter)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\ConfigCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\ConfigCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\ConfigCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\ConfigCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\ConfigCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\ConfigCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\ConfigCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\ConfigCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ConfigCategory extends Model
{
    protected $fillable = ['name', 'slug'];

    public function configs()
    {
        return $this->hasMany(Config::class, 'category_id');
    }

    public function delete()
    {
        $res = parent::delete();
        $this->configs->each->delete();
        return $res;
    }
}
