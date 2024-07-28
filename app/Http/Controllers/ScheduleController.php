<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Lookup;
use App\Models\Programs;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Schedule::select([
                'schedules.id',
                'programs.prog_name as program_name',
                'schedules.tanggal',
                DB::raw('DATE_FORMAT(schedules.waktu_from, "%H:%i") as waktu_from_formatted'),
                DB::raw('DATE_FORMAT(schedules.waktu_to, "%H:%i") as waktu_to_formatted'),
                'programs.price as harga',
                'schedules.lokasi',
                'schedules.seat_tersisa',
                'lookup.lookup_value as status',
                'schedules.created_by',
                'schedules.created_at'
            ])
                ->join('programs', 'schedules.program', '=', 'programs.id')
                ->join('lookup', function ($join) {
                    $join->on('schedules.status', '=', 'lookup.lookup_id')
                        ->where('lookup.lookup_type', '=', 'schedule_status');
                })
                ->get();

            foreach ($data as $schedule) {
                $schedule->formatted_tanggal = $schedule->formatted_tanggal;
            }

            $data->each(function ($item) {
                $item->waktu = $item->waktu_from_formatted . ' - ' . $item->waktu_to_formatted;
            });

            $dataTable = DataTables::of($data)->make(true);
            return $dataTable;
        }

        $data = [
            'title' => 'Schedule',
            'module_path' => 'schedule',
        ];
        return view('admin.schedule.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'module_path' => 'schedule',
            'type'  => 'create',
            'title' => 'Create Schedule',
            'select_programs' => Programs::all(),
            'select_status' => Lookup::where('lookup_type', 'schedule_status')->get(),
        ];

        return view('admin.schedule.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'program' => 'required|integer|exists:programs,id',
                'tanggal' => 'required|string',
                'waktu_from' => 'required|date_format:H:i',
                'waktu_to' => 'required|date_format:H:i',
                'lokasi' => 'required|string|max:255',
                'seat_tersisa' => 'required|integer',
                'status' => 'required|integer',
            ]);

            $validatedData['created_by'] = Auth::id();

            Schedule::create($validatedData);

            return response()->json(['success' => 'Schedule created successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create Schedule: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $schedule = Schedule::findOrFail($id);

            $validatedData = $request->validate([
                'program' => 'required|integer|exists:programs,id',
                'tanggal' => 'required|string',
                'waktu_from' => 'required|date_format:H:i',
                'waktu_to' => 'required|date_format:H:i',
                'lokasi' => 'required|string|max:255',
                'seat_tersisa' => 'required|integer',
                'status' => 'required|integer',
            ]);

            $validatedData['updated_by'] = Auth::id();

            $schedule->update($validatedData);

            return response()->json(['success' => 'Schedule updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update Schedule: ' . $e->getMessage()], 500);
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

        return view('admin.schedule.form', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'module_path' => 'schedule',
            'type'  => 'edit',
            'title' => 'Edit Schedule',
            'select_programs' => Programs::all(),
            'select_status' => Lookup::where('lookup_type', 'schedule_status')->get(),
            'dataForm'    => Schedule::where('id', $id)->first()
        ];

        return view('admin.schedule.form', $data);
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
