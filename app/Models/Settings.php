<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_app', 'email', 'phone', 'address', 'description', 'logo', 'fave_icon', 'instagram', 'facebook',
    ];
}
