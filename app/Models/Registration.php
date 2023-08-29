<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id')->select(['id', 'medical_record', 'patient_name', 'patient_gender']);
    }

    public function screening() {
        return $this->hasOne(Screening::class, 'id');
    }
}
