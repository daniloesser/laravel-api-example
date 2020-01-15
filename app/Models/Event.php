<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    //Table Name
    protected $table = 'j2y6w_events';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'parent_id',
        'customer_id',
        'cleaner_id',
        'service_id',
        'service_rate_id',
        'add_ons',
        'add_ons_list',
        'start',
        'actual_start',
        'end',
        'actual_end',
        'type',
        'title',
        'event_properties',
        'payment_status',
        'process_status',
        'cost',
        'additional_details',
        'key_leave_location',
        'pet',
        'parking',
        'real_estate_cleaning_details',
        'customer_comments',
        'cleaner_comments',
        'Question1',
        'Question3',
        'days_of_week',
        'how_to_enter',
        'is_in_match',
        'date_first_email',
        'first_response_status',
        'date_second_email',
        'second_response_status',
        'date_final_email',
        'final_response_status',
        'exclude_cleaner_ids',
        'cleaner_replaced_by_blast',
        'email_blast_sent_time',
        'max_num_files',
        'allow_upload',
        'details',
        'sms_details_code',
        'add_date',
        'last_update',
    ];

    public function Expert()
    {
        return $this->belongsTo(Expert::class, 'cleaner_id', 'id');
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function Series()
    {
        return $this->belongsTo(Series::class, 'parent_id', 'group_id');
    }

}
