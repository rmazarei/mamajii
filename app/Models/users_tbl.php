<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_tbl extends Authenticatable
{
    use HasFactory;
    protected $primaryKey="id";
    protected $table="users_tbls";
    protected $fillable=['username','bio','password','name','family','phone','email','login_token','date_time','user_type','status','website','google_auth','address','times','lat','lng','sex','b_date'];
    public $timestamps = false;
}
