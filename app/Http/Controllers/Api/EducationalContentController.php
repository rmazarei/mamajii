<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EducationalContentCollection;
use App\Http\Resources\EducationalContentResource;
use App\Models\EducationalContent;

class EducationalContentController extends Controller
{
    public function AllEducationalContents()
    {
        $educationalContents = EducationalContent::orderByDesc('created_at')->paginate();
        return new EducationalContentCollection(EducationalContentResource::collection($educationalContents));
    }
}
