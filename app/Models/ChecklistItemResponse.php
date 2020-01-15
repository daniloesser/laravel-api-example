<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ChecklistItemResponse extends Model
{

    //Table Name
    protected $table = 'j2y6w_checklist_item_responses';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'checklist_item_fk',
        'event_fk',
        'user_fk',
        'response',
        'comment',
        'image',
        'is_active',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public function ChecklistItem()
    {
        return $this->belongsTo('App\Models\ChecklistItem', 'checklist_item_fk', 'id');
    }
}
