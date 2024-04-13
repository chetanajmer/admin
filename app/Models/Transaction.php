<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    function getusers()
    {
        return $this->hasOne(User::class,'id','vendorid');
    }

    function getvendors()
    {
        return $this->hasOne(User::class,'id','userid');
    }
}
