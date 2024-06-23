<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreImage extends Model
{
    use HasFactory;
    protected $primaryKey="id";
    protected $table="store_images_tbls";
    protected $fillable=["date"];
    public $timestamps = false;
}
