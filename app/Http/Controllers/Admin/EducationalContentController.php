<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationalContent;
use Illuminate\Http\Request;

class EducationalContentController extends Controller
{

    // Display a list of educational content
    public function index()
    {
        $contents = EducationalContent::all();
        return view('Admin.Panel.educational_contents.index', compact('contents'));
    }

    // Show the form to create new content
    public function create()
    {
        return view('Admin.Panel.educational_contents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer|min:0', // Ensure price is an integer >= 0
            'discount' => 'nullable|integer|min:0', // Ensure discount is an integer >= 0
            'files.*' => 'file|mimes:jpg,png,mp4,mp3,pdf,doc,docx|max:20480', // Validate file types and size
        ]);

        // Create the educational content
        $content = EducationalContent::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount ?? 0,
        ]);

        // Handle file uploads (if any)
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filePath = $file->store('educational_content_files', 'public'); // Store file in the 'public' disk
                $content->files()->create([
                    'file_name' => $file->getClientOriginalName(),
                    'file_path' => $filePath,
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('admin.educational_contents.index')
            ->with('success', 'Educational content created successfully.');
    }


    // Show the form to edit existing content
    public function edit(EducationalContent $educationalContent)
    {
        return view('Admin.Panel.educational_contents.edit', compact('educationalContent'));
    }

    public function update(Request $request, EducationalContent $educationalContent)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer|min:0', // Ensure price is an integer >= 0
            'discount' => 'nullable|integer|min:0', // Ensure discount is an integer >= 0
            'files.*' => 'file|mimes:jpg,png,mp4,mp3,pdf,doc,docx|max:20480', // Validate file types and size
        ]);

        // Update the educational content
        $educationalContent->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount ?? 0,
        ]);

        // Handle file uploads (if any)
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filePath = $file->store('educational_content_files', 'public'); // Store file in the 'public' disk
                $educationalContent->files()->create([
                    'file_name' => $file->getClientOriginalName(),
                    'file_path' => $filePath,
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('admin.educational_contents.index')
            ->with('success', 'Educational content updated successfully.');
    }
}
