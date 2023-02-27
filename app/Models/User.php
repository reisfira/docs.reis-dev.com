<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, Notifiable; //, SoftDeletes;

    // plural table name because of the default setting from laravel
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',

        // 'created_by',
        // 'updated_by',
        // 'deleted_by',
    ];

    // defaults setting from laravel
    protected $hidden = [ 'password', 'remember_token', ];
    protected $casts = [ 'email_verified_at' => 'datetime', ];
    protected $appends = [ 'role' ];

    /**
     * ! we control in this system that 1 user has only 1 role, and the permissions are all controlled from that role
     * */
    public function getRoleAttribute()
    {
        $role = $this->roles()->first();
        return isset($role) ? $role->name : null;
    }

    // used for create/update
    public static function requestData($request)
    {
        $data = [];
        $data['name'] = $request['name'];
        $data['email'] = $request['email'];

        // only update password if got any changes
        if (isset($request['password']) && !empty($request['password'])) {
            $data['password'] = bcrypt($request['password']);
        }

        return $data;
    }
}
