<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{

    //Table Name
    protected $table = 'j2y6w_checklist_items';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'checklist_fk',
        'description',
        'area',
        'item_order',
        'is_active',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public function Checklist()
    {
        return $this->belongsTo('App\Models\Checklist', 'checklist_fk', 'id');
    }

    public function ChecklistItemResponse()
    {
        return $this->hasMany('App\Models\ChecklistItemResponse', 'checklist_item_fk', 'id');
    }

}
