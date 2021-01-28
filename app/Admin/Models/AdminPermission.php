<?php

namespace App\Admin\Models;

/**
 * App\Admin\Models\AdminPermission
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $http_method
 * @property string|null $http_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Admin\Models\AdminRole[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\Model filter(\App\Admin\Filters\Filter $filter)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminPermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminPermission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminPermission whereHttpMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminPermission whereHttpPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminPermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminPermission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminPermission whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminPermission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdminPermission extends Model
{
    protected $fillable = ['name', 'slug', 'http_method', 'http_path'];
    public static $httpMethods = [
        'GET', 'POST', 'PUT', 'DELETE', 'PATCH', 'OPTIONS', 'HEAD',
    ];

    public function setHttpMethodAttribute($method)
    {
        if (is_array($method)) {
            $this->attributes['http_method'] = implode(',', $method) ?: null;
        } else {
            $this->attributes['http_method'] = $method;
        }
    }

    public function getHttpMethodAttribute($method)
    {
        return array_filter(explode(',', $method));
    }

    public function setHttpPathAttribute($httpPath)
    {
        if (is_array($httpPath)) {
            $this->attributes['http_path'] = implode("\n", $httpPath) ?: null;
        } else {
            $this->attributes['http_path'] = $httpPath;
        }
    }

    public function getHttpPathAttribute($httpPath)
    {
        return array_filter(explode("\n", $httpPath));
    }

    public function roles()
    {
        return $this->belongsToMany(
            AdminRole::class,
            'admin_role_permission',
            'role_id',
            'permission_id'
        );
    }
}
