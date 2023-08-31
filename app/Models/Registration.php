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

    public function doctor() {
        return $this->belongsTo(User::class, 'doctor_id')->select(['id', 'name']);
    }

    public function service() {
        return $this->belongsTo(Service::class, 'service_id')->select(['id', 'service_name']);
    }

    public function payment() {
        return $this->belongsTo(Payment::class, 'payment_id')->select(['id', 'payment_name']);
    }

    public function screening() {
        return $this->hasOne(Screening::class, 'id');
    }

    public function actions() {
        return $this->hasMany(GeneralAction::class, 'id');
    }

    public function recipes() {
        return $this->hasMany(GeneralRecipe::class, 'id');
    }
}
