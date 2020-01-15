<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{

    //Table Name
    protected $table = 'j2y6w_checklists';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'series_fk',
        'is_active',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public function Series()
    {
        return $this->belongsTo(Series::class, 'series_fk', 'group_id');
    }

    public function ChecklistItem()
    {
        return $this->hasMany(ChecklistItem::class, 'checklist_fk', 'id');
    }

}
