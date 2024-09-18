<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorPatientRelation extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'patient_id'
    ];
}
