<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ServiceSubscriptions extends Model
{
    protected $table = "service_subscriptions";
    use HasApiTokens, HasFactory, Notifiable;
}
