<?php

namespace App\Http\Controllers;

use App\Models\Lookup;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Users::select([
                'users.id',
                'users.username',
                'lookup.lookup_value as role',
                'users.created_at',
                'users.updated_at'
            ])
                ->join('lookup', function ($join) {
                    $join->on('users.role', '=', 'lookup.lookup_id')
                        ->where('lookup.lookup_type', '=', 'user_role');
                })
                ->get();
            $dataTable = DataTables::of($data)->make(true);
            return $dataTable;
        }

        $data = [
            'title' => 'Users',
            'module_path' => 'users',
        ];
        return view('admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'module_path' => 'users',
            'type'  => 'create',
            'title' => 'Create User',
            'select_role' => Lookup::where('lookup_type', 'user_role')->get(),
        ];

        return view('admin.users.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'username' => 'required|string|max:255',
                'password' => 'required|string|min:6',
                'role' => 'required|integer'
            ]);

            $validatedData['password'] = bcrypt($request['password']);
            $validatedData['created_by'] = Auth::id();

            Users::create($validatedData);

            return response()->json(['success' => 'User created successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create User: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $user = Users::findOrFail($id);

            $validatedData = $request->validate([
                'username' => 'required|string|max:255',
                'role' => 'required|integer'
            ]);

            $validatedData['updated_by'] = Auth::id();

            $user->update($validatedData);

            return response()->json(['success' => 'User updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update User: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'module_path' => 'users',
            'type'  => 'view',
            'title' => 'Detail User',
            'select_role' => Lookup::where('lookup_type', 'user_role')->get(),
            'dataForm' => Users::select(['id', 'username', 'role', 'created_at', 'updated_at', 'created_by', 'updated_by'])->where('id', $id)->first()
        ];

        return view('admin.users.form', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'module_path' => 'users',
            'type'  => 'edit',
            'title' => 'Edit User',
            'select_role' => Lookup::where('lookup_type', 'user_role')->get(),
            'dataForm'  => Users::select(['id', 'username', 'role', 'created_at', 'updated_at', 'created_by', 'updated_by'])->where('id', $id)->first()
        ];

        return view('admin.users.form', $data);
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
            $user = Users::findOrFail($id);

            $user->delete();

            return response()->json(['success' => 'User deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete User: ' . $e->getMessage()], 500);
        }
    }
}
