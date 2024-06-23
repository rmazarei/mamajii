<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable=['file_name','file_address','file_address_server','file_type','file_extention','file_size','file_hash','file_date_time'];
    public $timestamps = false;
}
