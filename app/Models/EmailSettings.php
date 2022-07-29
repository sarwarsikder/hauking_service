<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class EmailSettings extends Model
{
    protected $table = "mail_template_settings";
    use HasApiTokens, HasFactory, Notifiable;
}
