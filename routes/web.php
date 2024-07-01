<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\ProgramsCategoryController;
use App\Http\Controllers\ProgramsController;
use App\Models\AboutUs;
use App\Models\Programs;
use App\Models\ProgramsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('home');
});

Route::get('/about-us', function () {
    return view('about-us', ['data' => AboutUs::first()]);
});

Route::get('/programs', function (Request $request) {
    $categorySlug = $request->query('category');
    if ($categorySlug) {
        $category = ProgramsCategory::where('category_name', Str::slug($categorySlug, ' '))->first();
        $categoryId = $category ? $category->id : null;
        $list_programs = Programs::where('prog_category', $categoryId)->paginate(2);
    } else {
        $list_programs = Programs::paginate(2);
    }

    return view('programs', [
        'list_programs' => $list_programs,
        'list_categories' => ProgramsCategory::withCount('programs')->get(),
        'selected_category_slug' => $categorySlug,
    ]);
});

Route::get('/program-details/{slug}', function ($slug) {
    $progName = Str::slug($slug, ' ');
    $program = Programs::with('category')->where('prog_name', $progName)->firstOrFail();
    return view('program-details', [
        'program' => $program,
        'list_categories' => ProgramsCategory::withCount('programs')->get(),
    ]);
});

Route::get('/instructors', function () {
    return view('instructors');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contact-us', function () {
    return view('contact-us');
});

// ADMIN
Route::prefix('adm')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard', ["title" => "Dashboard"]);
    })->middleware('auth');

    Route::get('/home', function () {
        return view('admin.home', ["title" => "Home"]);
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
        return view('admin.contact-us', ["title" => "Contact Us"]);
    })->middleware('auth');

    Route::get('/login', function () {
        return view('admin.login');
    })->name('login');

    Route::post('authenticate', [AuthController::class, 'authenticate']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('programs', ProgramsController::class)->middleware('auth');
    Route::resource('programs-category', ProgramsCategoryController::class)->middleware('auth');
});

// Route::resource('options', OptionController::class);

// Route::get('/adm', function () {
//     return view('admin.dashboard', ["title" => "Dashboard"]);
// })->middleware('auth');

// Route::get('/adm/login', function () {
//     return view('admin.login');
// })->name('login');
