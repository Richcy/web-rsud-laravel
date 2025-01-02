<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function event()
    {
        return $this->hasOne(Event::class, 'category_id');
    }
}
