<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'field_id',
        'office',
        'experience',
        'year',
        'month',
        'alumni',
        'nip',
        'str',
        'sip',
        'img',
        'status',
        'lang'
    ];

    public function field()
    {
        return $this->belongsTo(FieldDoctor::class, 'field_id'); // 'field_id' is the foreign key
    }

    public function schedule()
    {
        return $this->hasOne(DoctorSchedule::class); // Each doctor has one schedule
    }
}
