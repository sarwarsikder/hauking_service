<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Frequency extends Model
{
    protected $table = "frequency";
    use HasApiTokens, HasFactory, Notifiable;
}
