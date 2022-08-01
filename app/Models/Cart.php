<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    function service() {
        return $this->hasOne('App\Models\Service','id', 'service_id');
    }
}
