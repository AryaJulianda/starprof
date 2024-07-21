<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CarouselsController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\InstructorsController;
use App\Http\Controllers\ProgramsCategoryController;
use App\Http\Controllers\ProgramsController;
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
use App\Models\Testimonials;
use App\Models\Whys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('home', [
        'carousels' => Carousels::all(),
        'testimonials' => Testimonials::all(),
        'whys' => Whys::all(),
        'latest_blogs' => Blogs::orderBy('created_at', 'desc')->take(3)->get()
    ]);
});

Route::get('/about-us', function () {
    return view('about-us', [
        'data' => AboutUs::first(),
        'testimonials' => Testimonials::all(),
    ]);
});

Route::get('/programs', function (Request $request) {
    $categorySlug = $request->query('category');
    if ($categorySlug) {
        $category = ProgramsCategory::where('category_name', Str::slug($categorySlug, ' '))->first();
        $categoryId = $category ? $category->id : null;
        $list_programs = Programs::where('prog_category', $categoryId)->with(['join_instructor', 'category'])->paginate(6);
    } else {
        $list_programs = Programs::with(['join_instructor', 'category'])->paginate(6);
    }
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
    ]);
});

Route::get('/instructors', function () {
    $data = Instructors::paginate(5);
    return view('instructors', ['data' => $data]);
});

Route::get('/instructor-detail', function () {
    return view('instructor-detail');
});

Route::get('/blog', function () {
    $blogs = Blogs::paginate(2);
    return view('blogs', ['blogs' => $blogs]);
});

Route::get('/blog/{slug}', function ($slug) {
    $title = Str::slug($slug, ' ');
    $blog = Blogs::where('title', $title)->firstOrFail();
    return view('blog-detail', ['blog' => $blog]);
});

Route::get('/contact-us', function () {
    return view('contact-us', ['data' => ContactUs::first()]);
});

// ADMIN
Route::prefix('adm')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard', ["title" => "Dashboard"]);
    })->middleware('auth');

    Route::get('/home', function () {
        return view('admin.home.index', [
            "title" => "Home",
            "module_path" => "home"
        ]);
    })->middleware('auth');

    Route::get('/about-us', function () {
        $data = [
            "title" => "About Us",
            "module_path" => "about-us",
            "dataForm" => AboutUs::first()
        ];
        return view('admin.about-us', $data);
    })->middleware('auth');

    Route::put('/about-us', function (Request $request) {
        $request->validate([
            'desc'       => 'required|string',
            'image_file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vision'     => 'required|string',
            'mission'    => 'required|string',
        ]);

        $aboutUs = AboutUs::first();
        if (!$aboutUs) {
            $aboutUs = new AboutUs();
        }

        $aboutUs->desc       = $request->desc;
        $aboutUs->vision     = $request->vision;
        $aboutUs->mission    = $request->mission;
        $aboutUs->updated_by = Auth::id();

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
        ]);

        $contactUs = ContactUs::first();
        if (!$contactUs) {
            $contactUs = new ContactUs();
        }

        $contactUs->location = $request->location;
        $contactUs->phone = $request->phone;
        $contactUs->email = $request->email;
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

    Route::resource('blogs', BlogsController::class)->middleware('auth');
    Route::resource('users', UsersController::class)->middleware('auth');
});

// Route::resource('options', OptionController::class);

// Route::get('/adm', function () {
//     return view('admin.dashboard', ["title" => "Dashboard"]);
// })->middleware('auth');

// Route::get('/adm/login', function () {
//     return view('admin.login');
// })->name('login');
