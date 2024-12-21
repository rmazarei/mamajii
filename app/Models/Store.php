<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable=['title','content','type','date','delete_flag','visible','json','price','discount','adiscount'];
    public $timestamps = false;

    public function storeImages()
    {
        return $this->hasMany(StoreImage::class);
    }
}
