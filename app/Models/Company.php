<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    public function employees() {

        return $this->hasMany(Employee::class);

    }

    public function getCreatedAtAttribute($date)
    {
        return date('F j, Y', strtotime($date));
    }
}
