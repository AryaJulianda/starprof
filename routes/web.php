<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CarouselsController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\InstructorsController;
use App\Http\Controllers\ProgramsCategoryController;
use App\Http\Controllers\ProgramsController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WhysController;
use App\Models\AboutUs;
use App\Models\Blogs;
use App\Models\ContactUs;
use App\Models\Instructors;
use App\Models\Programs;
use App\Models\ProgramsCategory;
use App\Models\Carousels;
use App\Models\Lookup;
use App\Models\OurClient;
use App\Models\Quotes;
use App\Models\Schedule;
use App\Models\Testimonials;
use App\Models\Whys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('home', [
        'carousels' => Carousels::all(),
        'testimonials' => Testimonials::all(),
        'whys' => Whys::all(),
        'latest_blogs' => Blogs::orderBy('created_at', 'desc')->take(3)->get(),
        'programs' => Programs::with('category')->get(),
        'quotes' => Quotes::first()

    ]);
});

Route::get('/about-us', function () {
    return view('about-us', [
        'data' => AboutUs::first(),
        'testimonials' => Testimonials::all(),
        'instructors' => Instructors::all(),
        'total_instructor' => Instructors::count(),
        'our_clients' => OurClient::all()
    ]);
});

Route::post('/clients', function (Request $request) {
    try {
        $validatedData = $request->validate([
            'image_file_client' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image_file_client')) {
            $imagePath = $request->file('image_file_client')->store('client_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        OurClient::create($validatedData);

        return response()->json(['success' => 'Client added successfully']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to add client: ' . $e->getMessage()], 500);
    }
});

Route::get('/programs', function (Request $request) {
    $categorySlug = $request->query('category');
    $searchQuery = $request->query('search');

    $query = Programs::query();

    if ($categorySlug) {
        $category = ProgramsCategory::where('category_name', Str::slug($categorySlug, ' '))->first();
        $categoryId = $category ? $category->id : null;
        $query->where('prog_category', $categoryId);
    }

    if ($searchQuery) {
        $query->where('prog_name', 'LIKE', '%' . $searchQuery . '%');
    }

    $list_programs = $query->with(['join_instructor', 'category'])->paginate(9);

    return view('programs', [
        'list_programs' => $list_programs,
        'list_categories' => ProgramsCategory::withCount('programs')->get(),
        'selected_category_slug' => $categorySlug,
    ]);
});

Route::get('/program-details/{slug}', function ($slug) {
    $progName = Str::slug($slug, ' ');
    $program = Programs::with('category')->with('join_instructor')->where('prog_name', $progName)->firstOrFail();
    return view('program-details', [
        'program' => $program,
        'list_categories' => ProgramsCategory::withCount('programs')->get(),
        'contact_us' => ContactUs::first()
    ]);
});

Route::get('/instructors', function () {
    $data = Instructors::all();
    return view('instructors', ['data' => $data]);
});

Route::get('/instructor-detail/{slug}', function ($slug) {
    $name = Str::slug($slug, ' ');
    $instructor = Instructors::where('full_name', $name)->firstOrFail();
    $programs = Programs::where('instructor', $instructor->id)->get();

    return view('instructor-detail', [
        'instructor' => $instructor,
        'programs'   => $programs
    ]);
});


Route::get('/schedule', function (Request $request) {
    $categorySlug = $request->query('category');
    $statusSlug = $request->query('status');
    $monthSlug = $request->query('month');

    $list_schedule = Schedule::select([
        'schedules.id',
        'programs.prog_name as program_name',
        'programs_category.category_name as program_category_name',
        'schedules.tanggal',
        DB::raw('DATE_FORMAT(schedules.waktu_from, "%H:%i") as waktu_from_formatted'),
        DB::raw('DATE_FORMAT(schedules.waktu_to, "%H:%i") as waktu_to_formatted'),
        'instructors.full_name as trainer',
        'schedules.lokasi',
        'schedules.seat_tersisa',
        'lookup.lookup_value as status',
        'schedules.created_by',
        'schedules.created_at'
    ])
        ->join('programs', 'schedules.program', '=', 'programs.id')
        ->join('instructors', 'instructors.id', '=', 'programs.instructor')
        ->join('programs_category', 'programs_category.id', '=', 'programs.prog_category')
        ->join('lookup', function ($join) {
            $join->on('schedules.status', '=', 'lookup.lookup_id')
                ->where('lookup.lookup_type', '=', 'schedule_status');
        });

    if (!empty($categorySlug) && $categorySlug != 'all') {
        $list_schedule->where(DB::raw('LOWER(REPLACE(programs_category.category_name, " ", "-"))'), '=', strtolower($categorySlug));
    }

    if (!empty($statusSlug) && $statusSlug != 'all') {
        $list_schedule->where(DB::raw('LOWER(lookup.lookup_value)'), '=', strtolower($statusSlug));
    }

    if (!empty($monthSlug) && $monthSlug != 'all') {
        $list_schedule->where('schedules.tanggal', 'LIKE', str_replace('-', '/', $monthSlug) . '%');
    }

    $list_schedule = $list_schedule->paginate(10);

    $list_schedule->each(function ($item) {
        $item->waktu = $item->waktu_from_formatted . ' - ' . $item->waktu_to_formatted;
    });

    $currentMonth = Carbon::now();
    $months = [];
    for ($i = 0; $i < 5; $i++) {
        $months[] = $currentMonth->copy()->addMonths($i)->format('Y-m');
    }

    return view('schedule', [
        'list_schedule' => $list_schedule,
        'list_categories' => ProgramsCategory::all(),
        'categorySlug' => $categorySlug,
        'statusSlug' => $statusSlug,
        'monthSlug' => $monthSlug,
        'select_status' => Lookup::where('lookup_type', 'schedule_status')->get(),
        'months' => $months
    ]);
});


Route::get('/blog/{slug}', function ($slug) {
    $title = Str::slug($slug, ' ');
    $blog = Blogs::where('title', $title)->firstOrFail();
    return view('blog-detail', ['blog' => $blog]);
});

Route::get('/contact-us', function () {
    return view('contact-us', [
        'data' => ContactUs::first(),
        'programs' => Programs::with('category')->get()
    ]);
});

Route::post('/submit-registration', [EmailController::class, 'submitForm']);

// ADMIN
Route::prefix('adm')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard', ["title" => "Dashboard"]);
    })->middleware('auth');

    Route::get('/home', function () {
        return view('admin.home.index', [
            "title" => "Home",
            "module_path" => "home",
            "quotes" => Quotes::first()
        ]);
    })->middleware('auth');

    Route::get('/about-us', function () {
        $data = [
            "title" => "About Us",
            "module_path" => "about-us",
            "dataForm" => AboutUs::first(),
            "total_instructor" => Instructors::count(),
            'our_clients' => OurClient::all()
        ];
        return view('admin.about-us', $data);
    })->middleware('auth');

    Route::put('/about-us', function (Request $request) {
        $request->validate([
            'desc'                 => 'required|string',
            'image_file'           => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vision'               => 'required|string',
            'mission'              => 'required|string',
            'why_us'               => 'required|string',
            'our_trainer_desc'     => 'required|string',
            'completed_course'     => 'required|integer',
            'active_student'       => 'required|integer',
            'total_training_hours' => 'required|integer',
        ]);

        $aboutUs = AboutUs::first();
        if (!$aboutUs) {
            $aboutUs = new AboutUs();
        }

        $aboutUs->desc                 = $request->desc;
        $aboutUs->vision               = $request->vision;
        $aboutUs->mission              = $request->mission;
        $aboutUs->why_us               = $request->why_us;
        $aboutUs->our_trainer_desc     = $request->our_trainer_desc;
        $aboutUs->completed_course     = $request->completed_course;
        $aboutUs->active_student       = $request->active_student;
        $aboutUs->total_training_hours = $request->total_training_hours;
        $aboutUs->updated_by           = Auth::id();

        if ($request->hasFile('image_file')) {
            if ($aboutUs->image && Storage::exists('public/' . $aboutUs->image)) {
                Storage::delete('public/' . $aboutUs->image);
            }

            $filePath = $request->file('image_file')->store('about_us', 'public');
            $aboutUs->image = $filePath;
        }

        $aboutUs->save();

        return redirect()->back()->with('success', 'About Us updated successfully.');
    })->middleware('auth');

    Route::put('/quotes', function (Request $request) {
        $request->validate([
            'image_file'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quotes_text'      => 'required|string',
            'quotes_by_name'   => 'required|string',
            'quotes_by_status' => 'required|string',
        ]);

        $Quotes = Quotes::first();
        if (!$Quotes) {
            $Quotes = new Quotes();
        }

        $Quotes->quotes_by_name     = $request->quotes_by_name;
        $Quotes->quotes_by_status   = $request->quotes_by_status;
        $Quotes->quotes_text        = $request->quotes_text;

        if ($request->hasFile('image_file')) {
            if ($Quotes->image && Storage::exists('public/' . $Quotes->image)) {
                Storage::delete('public/' . $Quotes->image);
            }

            $filePath = $request->file('image_file')->store('quotes', 'public');
            $Quotes->image = $filePath;
        }

        $Quotes->save();

        return redirect()->back()->with('success', 'Quotes updated successfully.');
    })->middleware('auth');

    Route::get('/contact-us', function () {
        $data = [
            "title" => "Contact Us",
            "module_path" => "contact-us",
            "dataForm" => ContactUs::first()
        ];
        return view('admin.contact-us', $data);
    })->middleware('auth');

    Route::put('/contact-us', function (Request $request) {
        $request->validate([
            'location' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string|email',
            'how_to_register' => 'required|string',
        ]);

        $contactUs = ContactUs::first();
        if (!$contactUs) {
            $contactUs = new ContactUs();
        }

        $contactUs->location = $request->location;
        $contactUs->phone = $request->phone;
        $contactUs->email = $request->email;
        $contactUs->how_to_register = $request->how_to_register;
        $contactUs->updated_by = Auth::id();

        $contactUs->save();

        return redirect()->back()->with('success', 'Contact Us updated successfully.');
    })->middleware('auth');

    Route::get('/login', function () {
        return view('admin.login');
    })->name('login');

    Route::post('authenticate', [AuthController::class, 'authenticate']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('carousels', CarouselsController::class)->middleware('auth');
    Route::resource('testimonials', TestimonialsController::class)->middleware('auth');
    Route::resource('whys', WhysController::class)->middleware('auth');

    Route::resource('programs', ProgramsController::class)->middleware('auth');
    Route::resource('programs-category', ProgramsCategoryController::class)->middleware('auth');

    Route::resource('instructors', InstructorsController::class)->middleware('auth');

    Route::resource('schedule', ScheduleController::class)->middleware('auth');
    Route::resource('users', UsersController::class)->middleware('auth');
});

// Route::resource('options', OptionController::class);

// Route::get('/adm', function () {
//     return view('admin.dashboard', ["title" => "Dashboard"]);
// })->middleware('auth');

// Route::get('/adm/login', function () {
//     return view('admin.login');
// })->name('login');
