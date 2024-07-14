<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Blogs::select(['id', 'image', 'title', 'created_by', 'created_at']);
            $dataTable = DataTables::of($data)->make(true);
            return $dataTable;
        }

        $data = [
            'title' => 'Blogs',
            'module_path' => 'blogs',
        ];
        return view('admin.blogs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'module_path' => 'blogs',
            'type'  => 'create',
            'title' => 'Create Blog',
        ];

        return view('admin.blogs.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'text' => 'required|string',
            ]);

            if ($request->hasFile('image_file')) {
                $imagePath = $request->file('image_file')->store('blogs_image', 'public');
                $validatedData['image'] = $imagePath;
            }

            $validatedData['created_by'] = Auth::id();

            Blogs::create($validatedData);

            return response()->json(['success' => 'Blog created successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create Blog: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $blog = Blogs::findOrFail($id);

            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'text' => 'required|string',
                'image_file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('image_file')) {
                if ($blog->image) {
                    Storage::disk('public')->delete($blog->image);
                }

                $imagePath = $request->file('image_file')->store('blogs_image', 'public');
                $validatedData['image'] = $imagePath;
            }

            $validatedData['updated_by'] = Auth::id();

            $blog->update($validatedData);

            return response()->json(['success' => 'Blog updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update Blog: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'module_path' => 'blogs',
            'type'  => 'view',
            'title' => 'Detail Blog',
            'dataForm'    => Blogs::where('id', $id)->first()
        ];

        return view('admin.blogs.form', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'module_path' => 'blogs',
            'type'  => 'edit',
            'title' => 'Edit Blog',
            'dataForm'    => Blogs::where('id', $id)->first()
        ];

        return view('admin.blogs.form', $data);
    }


    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $blog = Blogs::findOrFail($id);

            // Delete the photo from storage
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            // Delete the instructor record
            $blog->delete();

            return response()->json(['success' => 'Blog deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete Blog: ' . $e->getMessage()], 500);
        }
    }
}



