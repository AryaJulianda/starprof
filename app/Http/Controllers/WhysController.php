<?php

namespace App\Http\Controllers;

use App\Models\Whys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class WhysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Whys::select(['id', 'header', 'text', 'created_by', 'created_at']);
            $dataTable = DataTables::of($data)->make(true);
            return $dataTable;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'module_path' => 'whys',
            'type'  => 'create',
            'title' => 'Create Why Choose Us'
        ];

        return view('admin.home.form-why', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'header' => 'required|string|max:255',
                'text' => 'required|string',
                'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            if ($request->hasFile('image_file')) {
                $imagePath = $request->file('image_file')->store('why_images', 'public');
                $validatedData['image'] = $imagePath;
            }

            $validatedData['created_by'] = auth()->user()->id;

            Whys::create($validatedData);

            return response()->json(['success' => 'Why Choose Us created successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create Why Choose Us: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $why = Whys::findOrFail($id);

            $validatedData = $request->validate([
                'header' => 'required|string|max:255',
                'text' => 'required|string',
                'image_file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            if ($request->hasFile('image_file')) {
                if ($why->image) {
                    Storage::disk('public')->delete($why->image);
                }

                $imagePath = $request->file('image_file')->store('why_images', 'public');
                $validatedData['image'] = $imagePath;
            }

            $validatedData['updated_by'] = auth()->user()->id;

            $why->update($validatedData);

            return response()->json(['success' => 'Why Choose Us updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create Why Choose Us: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'module_path' => 'whys',
            'type'        => 'view',
            'title'       => 'Detail Why Choose Us',
            'dataForm'    => Whys::where('id', $id)->first()
        ];

        return view('admin.home.form-why', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'module_path' => 'whys',
            'type'        => 'edit',
            'title'       => 'Edit Why Choose Us',
            'dataForm'    => Whys::where('id', $id)->first()
        ];

        return view('admin.home.form-why', $data);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $whys = Whys::findOrFail($id);

            if ($whys->image) {
                Storage::disk('public')->delete($whys->image);
            }

            $whys->delete();

            return response()->json(['success' => 'Why Choose Us deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete Why Choose Us: ' . $e->getMessage()], 500);
        }
    }
}
