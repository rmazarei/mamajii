<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transcation extends Model
{
    use HasFactory;
    protected $fillable=['value','date'];
    public $timestamps = false;
}
