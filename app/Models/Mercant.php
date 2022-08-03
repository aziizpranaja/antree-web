<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mercant extends Model
{
    use HasFactory;

    protected $fillable = ['mercant_name', 'address', 'mercant_email', 'phone', 'user_id', 'mercant_code', 'image'];
}
