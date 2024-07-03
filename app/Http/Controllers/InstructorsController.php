<?php

namespace App\Http\Controllers;

use App\Models\Instructors;
use App\Models\Programs;
use App\Models\ProgramsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Instructors::select(['id', 'photo', 'full_name', 'created_by', 'created_at']);
            $dataTable = DataTables::of($data)->make(true);
            return $dataTable;
        }

        $data = [
            'title' => 'Instructors',
            'module_path' => 'instructors',
        ];
        return view('admin.instructors.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'module_path' => 'instructors',
            'type'  => 'create',
            'title' => 'Create Instructor',
        ];

        return view('admin.instructors.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'full_name' => 'required|string|max:255',
                'photo_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'desc' => 'nullable|string',
            ]);

            if ($request->hasFile('photo_file')) {
                $imagePath = $request->file('photo_file')->store('instructors_photo', 'public');
                $validatedData['photo'] = $imagePath;
            }

            $validatedData['created_by'] = Auth::id();

            Instructors::create($validatedData);

            return response()->json(['success' => 'Instructor created successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create Instructor: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $instructor = Instructors::findOrFail($id);

            $validatedData = $request->validate([
                'full_name' => 'required|string|max:255',
                'desc' => 'nullable|string',
            ]);

            if ($request->hasFile('photo_file')) {
                if ($instructor->photo) {
                    Storage::disk('public')->delete($instructor->photo);
                }

                $imagePath = $request->file('photo_file')->store('instructors_photo', 'public');
                $validatedData['photo'] = $imagePath;
            }

            $validatedData['updated_by'] = Auth::id();

            $instructor->update($validatedData);

            return response()->json(['success' => 'Instructor updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update Instructor: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'module_path' => 'instructors',
            'type'  => 'view',
            'title' => 'Detail Instructor',
            'dataForm'    => Instructors::where('id', $id)->first()
        ];

        return view('admin.instructors.form', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'module_path' => 'instructors',
            'type'  => 'edit',
            'title' => 'Edit Instructor',
            'dataForm'    => Instructors::where('id', $id)->first()
        ];

        return view('admin.instructors.form', $data);
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
            $instructor = Instructors::findOrFail($id);

            // Delete the photo from storage
            if ($instructor->photo) {
                Storage::disk('public')->delete($instructor->photo);
            }

            // Delete the instructor record
            $instructor->delete();

            return response()->json(['success' => 'Instructor deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete Instructor: ' . $e->getMessage()], 500);
        }
    }
}
