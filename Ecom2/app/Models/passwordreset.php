<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class passwordreset extends Model
{
    use HasFactory;
    public $table = 'passwords_resets';
    public $timestamps = false;
}