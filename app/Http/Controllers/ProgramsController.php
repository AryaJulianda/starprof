<?php

namespace App\Http\Controllers;

use App\Models\Instructors;
use App\Models\Programs;
use App\Models\ProgramsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProgramsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Programs::select(['id', 'prog_name', 'prog_category', 'created_by', 'created_at']);
            return DataTables::of($data)->make(true);
        }

        return view('admin.programs.index', [
            'title' => 'Programs',
            'module_path' => 'programs',
        ]);
    }

    public function show($id)
    {
        return view('admin.programs.form', [
            'module_path' => 'programs',
            'type' => 'view',
            'title' => 'Detail Program',
            'select_programs_category' => ProgramsCategory::all(),
            'select_instructors' => Instructors::all(),
            'dataForm' => Programs::findOrFail($id),
        ]);
    }

    public function create()
    {
        return view('admin.programs.form', [
            'module_path' => 'programs',
            'type' => 'create',
            'title' => 'Create Program',
            'select_programs_category' => ProgramsCategory::all(),
            'select_instructors' => Instructors::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateData($request);

        if ($request->hasFile('prog_image_file')) {
            $validatedData['prog_image'] = $request->file('prog_image_file')->store('programs_images', 'public');
        }

        $validatedData['created_by'] = auth()->user()->id;
        Programs::create($validatedData);

        return response()->json(['success' => 'Program created successfully']);
    }

    public function edit($id)
    {
        return view('admin.programs.form', [
            'module_path' => 'programs',
            'type' => 'edit',
            'title' => 'Edit Program',
            'select_programs_category' => ProgramsCategory::all(),
            'select_instructors' => Instructors::all(),
            'dataForm' => Programs::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $program = Programs::findOrFail($id);
        $validatedData = $this->validateData($request);

        if ($request->hasFile('prog_image_file')) {
            if ($program->prog_image) {
                Storage::disk('public')->delete($program->prog_image);
            }
            $validatedData['prog_image'] = $request->file('prog_image_file')->store('programs_images', 'public');
        }

        $validatedData['updated_by'] = auth()->user()->id;
        $program->update($validatedData);

        return response()->json(['success' => 'Program updated successfully']);
    }

    public function destroy($id)
    {
        $program = Programs::findOrFail($id);
        if ($program->prog_image) {
            Storage::disk('public')->delete($program->prog_image);
        }
        $program->delete();

        return response()->json(['success' => 'Program deleted successfully']);
    }

    private function validateData($request)
    {
        return $request->validate([
            'prog_name' => 'required|string|max:255',
            'prog_category' => 'required|integer|exists:programs_category,id',
            'instructor' => 'required|integer|exists:instructors,id',
            'prog_image_file' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc' => 'nullable|string',
            'price' => 'nullable|integer',
            'popular' => 'nullable|boolean',
        ]);
    }
}
