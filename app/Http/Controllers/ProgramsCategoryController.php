<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramsCategory;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProgramsCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ProgramsCategory::select(['id', 'category_name', 'created_by', 'created_at']);
            $dataTable = DataTables::of($data)->make(true);
            return $dataTable;
        }

        $data = [
            'title' => 'Program Category'
        ];

        return view('admin.programs-category.index', $data);
    }

    public function create()
    {
        $data = [
            'type'  => 'create',
            'title' => 'Create Programs Category',
        ];

        return view('admin.programs-category.form', $data);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'category_name' => 'required|string|max:255',
                'category_image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('category_image_file')) {
                $imagePath = $request->file('category_image_file')->store('programs_category_images', 'public');
                $validatedData['category_image'] = $imagePath;
            }

            $validatedData['created_by'] = auth()->user()->id;

            ProgramsCategory::create($validatedData);

            return response()->json(['success' => 'Program Category created successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create program Category: ' . $e->getMessage()], 500);
        }
    }

    public function show(string $id)
    {
        $data = [
            'type'     => 'view',
            'title'    => 'Detail Programs Category',
            'dataForm' => ProgramsCategory::where('id', $id)->first()
        ];

        return view('admin.programs-category.form', $data);
    }

    public function edit(string $id)
    {
        $data = [
            'type'     => 'edit',
            'title'    => 'Edit Programs Category',
            'dataForm' => ProgramsCategory::where('id', $id)->first()
        ];

        return view('admin.programs-category.form', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            $p_category = ProgramsCategory::findOrFail($id);

            $validatedData = $request->validate([
                'category_name' => 'required|string|max:255',
                'category_image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('category_image_file')) {
                if ($p_category->category_image) {
                    Storage::disk('public')->delete($p_category->category_image);
                }

                $imagePath = $request->file('category_image_file')->store('programs_category_images', 'public');
                $validatedData['category_image'] = $imagePath;
            }

            $validatedData['updated_by'] = auth()->user()->id;

            $p_category->update($validatedData);

            return response()->json(['success' => 'Program Category updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create program Category: ' . $e->getMessage()], 500);
        }
    }

    public function destroy(string $id)
    {
        $c_category = ProgramsCategory::where('id', $id)->first();
        if ($c_category->category_image) {
            Storage::disk('public')->delete($c_category->category_image);
        }
        if ($c_category->delete()) {
            return response()->json(['message' => 'Programs Category deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Failed to delete Programs Category'], 500);
        }
    }
}
