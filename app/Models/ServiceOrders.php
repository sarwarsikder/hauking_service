<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ServiceOrders extends Model
{
    protected $table = "service_orders";
    use HasApiTokens, HasFactory, Notifiable;

    public function service(){
        return $this->hasOne('App\Models\Service','id', 'service_id');
    }
}
