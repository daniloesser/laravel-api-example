<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    //Table Name
    protected $table = 'j2y6w_groups';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];


    public function Users()
    {
        return $this->belongsToMany('App\Models\User', 'j2y6w_users_groups', 'group_id', 'user_id');
    }
}
