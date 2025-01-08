<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldDoctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lang'
    ];

    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'field_id');
    }
}
