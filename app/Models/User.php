<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'password', 'name', 'active'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
