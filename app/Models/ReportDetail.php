<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportDetail extends Model
{
    use HasFactory;
    protected $fillable=['content','date_time','condition','user_id'];
    public $timestamps = false;
}
