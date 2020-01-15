<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    //Table Name
    protected $table = 'j2y6w_customers';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'first_name',
        'last_name',
        'username',
        'mobile_number',
        'home_number',
        'email_address',
        'street_number',
        'route',
        'unit',
        'buzzer_code',
        'city',
        'country',
        'latitude',
        'longitude',
        'province',
        'postal_code',
        'password',
        'optout_reminder',
        'block',
        'sendEmail',
        'receiveCheckoutEmail',
        'registerDate',
        'lastvisitDate',
        'activation',
        'params',
        'lastResetTime',
        'resetCount',
        'otpKey',
        'otep',
        'requireReset',
        'uploaded_pdf',
        'hidden',
        'process_status',
        'CustomerType',
        'Business_Type',
        'Real_estate_type',
        'brokerage',
        'hear',
        'Bnb_type',
        'allow_2_hour_booking',
        'allow_onetime_booking',
        'custom_hourly_rate',
        'customer_note_admin',
        'sms_rules',
    ];


    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Event()
    {
        return $this->hasMany(Event::class, 'customer_id', 'id');
    }

}
