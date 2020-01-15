<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BusinessDetail extends Model
{

    //Table Name
    protected $table = '2y6w_business_detail';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'business_id',
        'user_id',
        'business_type',
        'business_type_description',
        'company_name',
        'square_footage',
        'is_supply_on_premise',
        'date_first_phone',
        'phone_convenient_time',
        'first_name',
        'last_name',
        'mobile_phone',
        'street_number',
        'street_name',
        'unit',
        'buzzer_code',
        'city',
        'province',
        'country',
        'postal_code',
        'latitude',
        'longitude',
        'add_date',
        'last_update',
    ];


    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Series()
    {
        return $this->hasMany(Series::class, 'business_id', 'business_id');
    }

}
