<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Series extends Model
{

    //Table Name
    protected $table = 'j2y6w_business_schedule_parents';
    protected $primaryKey = 'group_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id', //primary key
        'user_id',
        'business_id',
        'unit',
        'date_first_phone',
        'phone_convenient_time',
        'service_id',
        'cleaning_supplies',
        'cleaners_schedules',
        'cleaning_frequency',
        'service_start_date',
        'service_date_to',
        'date_service_terminated',
        'is_enabled',
        'status_paypal',
        'payment_status',
        'last_payment_date',
        'next_payment_date',
        'additional_details',
        'key_leave_location',
        'parking',
        'cost',
        'custom_hourly_rate',
        'hourly_price',
        'total_hours',
        'coupon_code',
        'coupon_discount',
        'subtotal',
        'tax_amount',
        'total_amount',
        'pdf_name',
        'pdf_path',
        'pre_selected_cleaner_id',
        'date_switch_cleaner',
        'comment_switch_cleaner',
        'date_cancel_service',
        'comment_cancel_service',
        'cancellation_code',
        'cancellation_comment',
        'last_paypal_action',
        'last_paypal_statge',
        'last_payment_stub',
        'pnref',
        'last_date_pnref',
        'RPREF',
        'PROFILEID',
        'card_number',
        'EXPDATE',
        'by_admin',
        'child_group',
        'add_date',
        'last_update',
        'exclude_cleaner_ids',
        'email_blast_sent_time',
        'email_blast_closed',
        'exclude_cleaner_ids_recurring',
        'email_blast_sent_time_recurring',
        'email_blast_closed_recurring',
        'admin_note',
        'one_time_cleaning_invoice_created',
    ];

    public function User()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function Checklist()
    {
        return $this->hasMany(Checklist::class, 'series_fk', 'group_id');
    }

    public function BusinessDetail()
    {
        return $this->belongsTo(BusinessDetail::class, 'business_id', 'business_id');
    }

    public function Event()
    {
        return $this->hasMany(Event::class, 'parent_id', 'group_id');
    }

}
