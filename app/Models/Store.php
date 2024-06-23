<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;
    protected $primaryKey="id";
    protected $table="store_tbls";
    protected $fillable=['title','content','type','date','delete_flag','visible','json','price','discount','adiscount'];
    public $timestamps = false;
}
