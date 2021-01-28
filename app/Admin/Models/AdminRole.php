<?php

namespace App\Admin\Models;

/**
 * App\Admin\Models\AdminRole
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Admin\Models\AdminPermission[] $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Model filter(\App\Admin\Filters\Filter $filter)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminRole whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminRole whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminRole whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdminRole extends Model
{
    protected $fillable = ['name', 'slug'];

    public function permissions()
    {
        return $this->belongsToMany(
            AdminPermission::class,
            'admin_role_permission',
            'role_id',
            'permission_id'
        );
    }

    public function delete()
    {
        $this->permissions()->detach();
        return parent::delete();
    }
}
