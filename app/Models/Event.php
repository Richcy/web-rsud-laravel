<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sub_desc',
        'description',
        'category',
        'url',
        'img',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'location',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'category_id');
    }
}
