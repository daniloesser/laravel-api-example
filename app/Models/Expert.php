<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{

    //Table Name
    protected $table = 'j2y6w_cleaners';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'parent_id',
        'first_name',
        'last_name',
        'mobile_number',
        'business_name',
        'email_address',
        'password',
        'street_number',
        'route',
        'unit',
        'city',
        'province',
        'postal_code',
        'latitude',
        'longitude',
        'is_team',
        'liability_insurance',
        'insurance_coverage',
        'is_criminal_background',
        'is_eligible_to_work',
        'real_estate_exp',
        'bnb_exp',
        'is_deep_cleaning',
        'is_cleaning',
        'house_monitoring_exp',
        'deep_cleaning_exp',
        'cleaning_exp',
        'is_house_monitoring',
        'is_house_sitting',
        'interior_select',
        'house_sitting_exp',
        'is_move_ins_outs',
        'move_ins_outs_exp',
        'professional_experience',
        'your_experience',
        'how_you_heard',
        'were_you_referred',
        'referrer_name',
        'name_badge',
        'further_process',
        'cities',
        'other_city_name',
        'time_to_call',
        'tools',
        'ref_first_name_1',
        'ref_last_name_1',
        'ref_business_name_1',
        'ref_first_name_2',
        'ref_last_name_2',
        'ref_business_name_2',
        'social_insurance_number',
        'transit',
        'financial_institution',
        'bank_account_number',
        'bank_number',
        'business_license',
        'hst_number',
        'wsib',
        'cleaner_status',
        'working_radius',
        'profile_img',
        'uploaded_criminal_background',
        'hidden',
        'profile_resume',
        'profile_wsib',
        'profile_badge',
        'profile_liability_insurance',
        'general_comment',
        'deduction',
        'hourly_rate',
        'is_read_1',
        'is_read_2',
        'is_read_3',
        'process_status',
        'activation_info_pending',
        'activation_info_lock',
        'activation_email_reminders'
    ];



    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function Availability()
    {
        return $this->hasMany('App\Models\ExpertAvailability', 'cleaner_id', 'id');
    }

}
