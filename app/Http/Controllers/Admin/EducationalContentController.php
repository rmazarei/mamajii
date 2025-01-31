<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationalContent;
use App\Models\EducationalContentFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount ?? 0,
        ]);

        // Handle file uploads (if any)
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filePath = $file->store('educational_content_files/' . $content->id, 'public'); // Store file in the 'public' disk
                $content->files()->create([
                    'file_name' => $file->getClientOriginalName(),
                    'file_path' => $filePath,
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }


        // Handle file uploads (if any)
        if ($request->hasFile('cover')) {
                $filePath = $file->store('educational_content_files/' . $content->id, 'public'); // Store file in the 'public' disk
                $content->cover = $filePath;
        }
        $content->save();

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

    public function destroy(EducationalContent $educationalContent)
    {
        $educationalContent->delete(); // Soft delete the content

        return redirect()->route('admin.educational_contents.index')
            ->with('success', 'Educational content deleted successfully.');
    }

    public function restore($id)
    {
        $content = EducationalContent::withTrashed()->findOrFail($id); // Retrieve the soft-deleted record
        $content->restore(); // Restore the record

        return redirect()->route('admin.educational_contents.index')
            ->with('success', 'Educational content restored successfully.');
    }

    /**
     * Delete a file from an educational content.
     *
     * @param  EducationalContentFile  $file
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyFile(EducationalContentFile $file)
    {
        // Delete the file from storage
        if (Storage::exists('public/' . $file->file_path)) {
            Storage::delete('public/' . $file->file_path);
        }

        // Delete the file record from the database
        $file->delete();

        return redirect()->back()->with('success', 'فایل با موفقیت حذف شد.');
    }
}
