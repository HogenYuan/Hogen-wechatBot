<?php

namespace App\Admin\Models;

use App\Admin\Traits\ModelHelpers;
use App\Admin\Utils\HasPermissions;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Admin\Models\AdminUser
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string|null $avatar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Admin\Models\AdminPermission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Admin\Models\AdminRole[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminUser filter(\App\Admin\Filters\Filter $filter)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminUser whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin\Models\AdminUser whereUsername($value)
 * @mixin \Eloquent
 */
class AdminUser extends Authenticatable
{
    use HasPermissions;
    use Notifiable;
    use ModelHelpers;

    protected $fillable = ['username', 'password', 'name', 'avatar'];

    public function roles()
    {
        return $this->belongsToMany(
            AdminRole::class,
            'admin_user_role',
            'user_id',
            'role_id'
        );
    }

    public function permissions()
    {
        return $this->belongsToMany(
            AdminPermission::class,
            'admin_user_permission',
            'user_id',
            'permission_id'
        );
    }

    /**
     * 从请求数据中添加用户
     *
     * @param array $inputs
     * @param bool $hashedPassword 传入的密码, 是否是没有哈希处理的明文密码
     *
     * @return AdminUser|\Illuminate\Database\Eloquent\Model
     */
    public static function createUser($inputs, $hashedPassword = false)
    {
        if (!$hashedPassword) {
            $inputs['password'] = bcrypt($inputs['password']);
        }

        return static::create($inputs);
    }

    /**
     * 从请求数据中, 更新一条记录
     *
     * @param array $inputs
     * @param bool $hashedPassword 传入的密码, 是否是没有哈希处理的明文密码
     *
     * @return bool
     */
    public function updateUser($inputs, $hashedPassword = false)
    {
        // 更新时, 填了密码, 且没有经过哈希处理
        if (
            isset($inputs['password']) &&
            !$hashedPassword
        ) {
            $inputs['password'] = bcrypt($inputs['password']);
        }

        return $this->update($inputs);
    }
}
