<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralAction extends Model
{
    use HasFactory;

    public function registration() {
        return $this->belongsTo(Registration::class, 'registration_id');
    }
}
