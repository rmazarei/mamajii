<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $fillable=['name','bio','lat','lng','address','start_time','end_time','tel','status'];
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
