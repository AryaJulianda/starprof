<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseCategory;
use Yajra\DataTables\Facades\DataTables;

class CourseCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CourseCategory::select(['id', 'category_name', 'created_by', 'created_at']);
            $dataTable = DataTables::of($data)->make(true);
            return $dataTable;
        }

        $data = [
            'title' => 'Course Category'
        ];

        return view('admin.courses-category.index', $data);
    }

    public function create()
    {
        $data = [
            'type'  => 'create',
            'title' => 'Create Courses Category',
        ];

        return view('admin.courses-category.form', $data);
    }

    public function store(Request $request)
    {
        $category = new CourseCategory();
        $category->category_name = $request['category_name'];
        $category->created_by = 0;

        if ($category->save()) {
            return response()->json(['message' => 'Courses Category created successfully'], 201);
        } else {
            return response()->json(['message' => 'Failed to create Courses Category'], 500);
        }
    }

    public function show(string $id)
    {
        $data = [
            'type'     => 'view',
            'title'    => 'Detail Courses Category',
            'dataForm' => CourseCategory::where('id', $id)->first()
        ];

        return view('admin.courses-category.form', $data);
    }

    public function edit(string $id)
    {
        $data = [
            'type'     => 'edit',
            'title'    => 'Edit Courses Category',
            'dataForm' => CourseCategory::where('id', $id)->first()
        ];

        return view('admin.courses-category.form', $data);
    }

    public function update(Request $request, string $id)
    {
        $c_category = CourseCategory::where('id', $id)->first();
        $c_category->category_name = $request['category_name'];
        $c_category->updated_by = 1;

        if ($c_category->save()) {
            return response()->json(['message' => 'Courses Category update successfully'], 201);
        } else {
            return response()->json(['message' => 'Failed to update Courses Category'], 500);
        }
    }

    public function destroy(string $id)
    {
        $c_category = CourseCategory::where('id', $id)->first();
        if ($c_category->delete()) {
            return response()->json(['message' => 'Courses Category deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Failed to delete Courses Category'], 500);
        }
    }
}
