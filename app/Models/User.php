<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    //Table Name
    protected $table = 'j2y6w_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'ip_address',
        'username',
        'created_on',
        'authorization',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'username',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];

    public function Groups()
    {
        return $this->belongsToMany('App\Models\Group', 'j2y6w_users_groups', 'user_id', 'group_id');
    }

    public function Expert()
    {
        return $this->hasOne('App\Models\Expert', 'user_id', 'id');
    }
}
