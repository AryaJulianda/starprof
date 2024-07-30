<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Testimonials::select([
                'testimonials.id',
                'testimonials.name',
                'testimonials.text',
                'testimonials.created_by',
                'users.username as created_by_username',
                'testimonials.created_at'
            ])
                ->join('users', 'testimonials.created_by', '=', 'users.id')
                ->get();
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
            'module_path' => 'testimonials',
            'type'  => 'create',
            'title' => 'Create Testimonial'
        ];

        return view('admin.home.form-testimonials', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'text' => 'required|string',
                'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            if ($request->hasFile('image_file')) {
                $imagePath = $request->file('image_file')->store('testimonial_images', 'public');
                $validatedData['image'] = $imagePath;
            }

            $validatedData['created_by'] = auth()->user()->id;

            Testimonials::create($validatedData);

            return response()->json(['success' => 'Testimonial created successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create Testimonial: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $testimonial = Testimonials::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'text' => 'required|string',
                'image_file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            if ($request->hasFile('image_file')) {
                if ($testimonial->image) {
                    Storage::disk('public')->delete($testimonial->image);
                }

                $imagePath = $request->file('image_file')->store('testimonial_images', 'public');
                $validatedData['image'] = $imagePath;
            }

            $validatedData['updated_by'] = auth()->user()->id;

            $testimonial->update($validatedData);

            return response()->json(['success' => 'Testimonial updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create Testimonial: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataForm = Testimonials::select([
            'testimonials.id',
            'testimonials.name',
            'testimonials.text',
            'testimonials.image',
            'users.username as created_by',
            'testimonials.created_at'
        ])
            ->join('users', 'testimonials.created_by', '=', 'users.id')
            ->where('testimonials.id', $id)
            ->first();

        $data = [
            'module_path' => 'testimonials',
            'type'        => 'view',
            'title'       => 'Detail Testimonial',
            'dataForm'    => $dataForm
        ];

        return view('admin.home.form-testimonials', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataForm = Testimonials::select([
            'testimonials.id',
            'testimonials.name',
            'testimonials.text',
            'testimonials.image',
            'users.username as created_by',
            'testimonials.created_at'
        ])
            ->join('users', 'testimonials.created_by', '=', 'users.id')
            ->where('testimonials.id', $id)
            ->first();

        $data = [
            'module_path' => 'testimonials',
            'type'        => 'edit',
            'title'       => 'Edit Testimonial',
            'dataForm'    => $dataForm
        ];

        return view('admin.home.form-testimonials', $data);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $testimonials = Testimonials::findOrFail($id);

            if ($testimonials->image) {
                Storage::disk('public')->delete($testimonials->image);
            }

            $testimonials->delete();

            return response()->json(['success' => 'Testimonial deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete Testimonial: ' . $e->getMessage()], 500);
        }
    }
}
