<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Comments extends Model
{
    use HasFactory;

    public function userInfo(){
        return $this->belongsTo( User::class , 'user_id');
    }
}
