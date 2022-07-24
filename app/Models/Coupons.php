<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Coupons extends Model
{
    protected $table = "coupons";

    use HasApiTokens, HasFactory, Notifiable;
}
