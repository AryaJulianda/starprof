<?php

namespace App\Http\Controllers;

use App\Models\Carousels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CarouselsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Carousels::select(['id', 'text_1', 'text_2', 'created_by', 'created_at']);
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
            'module_path' => 'carousels',
            'type'  => 'create',
            'title' => 'Create Carousel'
        ];

        return view('admin.home.form-carousels', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'text_1' => 'required|string|max:255',
                'text_2' => 'required|string',
                'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            if ($request->hasFile('image_file')) {
                $imagePath = $request->file('image_file')->store('carousel_images', 'public');
                $validatedData['image'] = $imagePath;
            }

            $validatedData['created_by'] = auth()->user()->id;

            Carousels::create($validatedData);

            return response()->json(['success' => 'Carousel created successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create carousel: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $carousel = Carousels::findOrFail($id);

            $validatedData = $request->validate([
                'text_1' => 'required|string|max:255',
                'text_2' => 'required|string',
                'image_file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            if ($request->hasFile('image_file')) {
                if ($carousel->image) {
                    Storage::disk('public')->delete($carousel->image);
                }

                $imagePath = $request->file('image_file')->store('carousel_images', 'public');
                $validatedData['image'] = $imagePath;
            }

            $validatedData['updated_by'] = auth()->user()->id;

            $carousel->update($validatedData);

            return response()->json(['success' => 'Carousel updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create Carousel: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'module_path' => 'carousels',
            'type'        => 'view',
            'title'       => 'Detail Carousel',
            'dataForm'    => Carousels::where('id', $id)->first()
        ];

        return view('admin.home.form-carousels', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'module_path' => 'carousels',
            'type'        => 'edit',
            'title'       => 'Edit Carousel',
            'dataForm'    => Carousels::where('id', $id)->first()
        ];

        return view('admin.home.form-carousels', $data);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $carousels = Carousels::findOrFail($id);

            if ($carousels->image) {
                Storage::disk('public')->delete($carousels->image);
            }

            $carousels->delete();

            return response()->json(['success' => 'Carousels deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete Carousels: ' . $e->getMessage()], 500);
        }
    }
}
