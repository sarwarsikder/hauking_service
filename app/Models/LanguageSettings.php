<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class LanguageSettings extends Model
{
    protected $table = "language_settings";

    use HasApiTokens, HasFactory, Notifiable;
}
