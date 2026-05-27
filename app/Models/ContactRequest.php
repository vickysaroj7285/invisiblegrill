<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'address',
        'locale',
        'ip_address',
        'user_agent',
    ];
}
