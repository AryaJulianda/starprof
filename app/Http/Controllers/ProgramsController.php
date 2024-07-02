<?php

namespace App\Http\Controllers;

use App\Models\Programs;
use App\Models\ProgramsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Programs::select(['id', 'prog_name', 'prog_category', 'created_by', 'created_at']);
            $dataTable = DataTables::of($data)->make(true);
            return $dataTable;
        }

        $data = [
            'title' => 'Programs',
            'module_path' => 'programs',
        ];
        return view('admin.programs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'module_path' => 'programs',
            'type'  => 'create',
            'title' => 'Create Program',
            'select_programs_category' => ProgramsCategory::all()
        ];

        return view('admin.programs.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'prog_name' => 'required|string|max:255',
                'prog_category' => 'required|integer|exists:programs_category,id',
                'prog_image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'desc' => 'nullable|string',
            ]);

            if ($request->hasFile('prog_image_file')) {
                $imagePath = $request->file('prog_image_file')->store('programs_images', 'public');
                $validatedData['prog_image'] = $imagePath;
            }

            $validatedData['created_by'] = auth()->user()->id;

            Programs::create($validatedData);

            return response()->json(['success' => 'Program created successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create program: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $program = Programs::findOrFail($id);

            $validatedData = $request->validate([
                'prog_name' => 'required|string|max:255',
                'prog_category' => 'required|integer|exists:programs_category,id',
                'prog_image_file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'desc' => 'nullable|string',
            ]);

            if ($request->hasFile('prog_image_file')) {
                if ($program->prog_image) {
                    Storage::disk('public')->delete($program->prog_image);
                }

                $imagePath = $request->file('prog_image_file')->store('programs_images', 'public');
                $validatedData['prog_image'] = $imagePath;
            }

            $validatedData['updated_by'] = auth()->user()->id;

            $program->update($validatedData);

            return response()->json(['success' => 'Program updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create program: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'module_path' => 'programs',
            'type'        => 'view',
            'title'       => 'Detail Program',
            'select_programs_category' => ProgramsCategory::all(),
            'dataForm'    => Programs::where('id', $id)->first()
        ];

        return view('admin.programs.form', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'module_path' => 'programs',
            'type'        => 'edit',
            'title'       => 'Detail Program',
            'select_programs_category' => ProgramsCategory::all(),
            'dataForm'    => Programs::where('id', $id)->first()
        ];

        return view('admin.programs.form', $data);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $program = Programs::findOrFail($id);

            // Delete the program image from storage
            if ($program->prog_image) {
                Storage::disk('public')->delete($program->prog_image);
            }

            // Delete the program record
            $program->delete();

            return response()->json(['success' => 'Program deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete program: ' . $e->getMessage()], 500);
        }
    }
}
