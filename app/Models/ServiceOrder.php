<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function subscription()
    {
        return $this->hasOne(Service::class);
    }
}
