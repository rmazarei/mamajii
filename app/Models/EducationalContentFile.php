<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalContentFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'educational_content_id',
        'file_name',
        'file_path',
        'file_type',
    ];

    // Relationship: A file belongs to an EducationalContent
    public function educationalContent()
    {
        return $this->belongsTo(EducationalContent::class);
    }
}
