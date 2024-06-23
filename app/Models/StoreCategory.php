<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreCategory extends Model
{
    use HasFactory;
    protected $fillable=['title','root_cat_id','icon_address','datetime','castom_link','visible','delete_flag'];
    public $timestamps = false;
}
