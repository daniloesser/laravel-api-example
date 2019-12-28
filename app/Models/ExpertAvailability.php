<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ExpertAvailability extends Model
{

    //Table Name
    protected $table = 'j2y6w_cleaner_availability';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cleaner_id',
        'day_of_week',
        'start_time',
        'end_time',
        'last_update'
    ];


    public function Expert()
    {
        return $this->belongsTo('App\Models\Expert', 'cleaner_id', 'id');
    }
}
