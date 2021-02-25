<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    public function company() {

        return $this->belongsTo(Company::class);

    }

    public function getCreatedAtAttribute($date)
    {
        return date('F j, Y', strtotime($date));
    }

}
