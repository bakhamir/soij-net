<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserToken extends Model
{
    protected $table = 'user_token';
    use HasFactory;
    protected $guarded = [];
}
