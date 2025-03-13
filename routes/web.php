<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YourController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\TPFRecruitmentController;

// Home Route
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');


// Admissions Routes
    Route::prefix('admissions')->name('admissions.')->group(function () {
    Route::get('/undergraduate', [YourController::class, 'undergraduate'])->name('undergraduate');
    Route::get('/graduate', [YourController::class, 'graduate'])->name('graduate');
    Route::get('/apply', [YourController::class, 'apply']);
// other routes as needed
});

// News Routes
    Route::prefix('news')->name('news.')->group(function () {
    Route::get('/latest', [YourController::class, 'latest'])->name('latest');
    Route::get('/upcoming', [YourController::class, 'upcoming'])->name('upcoming');
    Route::get('/announcements', [YourController::class, 'announcements'])->name('announcements');
    Route::get('/detail/{id}', [YourController::class, 'detail'])->name('detail');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events-detail');
    Route::resource('events', EventController::class);
    

// Resource route for all news operations
Route::resource('news', NewsController::class);

// Add this to fix your specific error with news-deatail (keeping the typo to match your error)
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news-deatail');

// Also add the correct spelling in case you want to fix the typo in your views later
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news-detail');
});

// News routes
Route::resource('news', App\Http\Controllers\NewsController::class);

// About Routes
Route::prefix('about')->name('about.')->group(function () {
    Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history');
    Route::get('/history/{month}', [App\Http\Controllers\HistoryController::class, 'showMonth'])->name('history.month');
    Route::get('/mission', [YourController::class, 'mission'])->name('mission');
    Route::get('/leadership', [App\Http\Controllers\LeaderController::class, 'index'])->name('leadership');
    Route::get('/leadership/{slug}', [App\Http\Controllers\LeaderController::class, 'show'])->name('leadership.show');
    // Other routes remain the same
});
// Facilities Routes
    Route::prefix('facilities')->name('facilities.')->group(function () {
    Route::get('/sports', [YourController::class, 'sports'])->name('sports');
    Route::get('/sports', [SportsController::class, 'index'])->name('sports');
    Route::get('/training', [YourController::class, 'training'])->name('training');
    Route::get('/training', [TrainingController::class, 'index'])->name('training');
    Route::get('/api/trainings', [TrainingController::class, 'getTrainings']);
    Route::get('/library', [YourController::class, 'library'])->name('library');
    Route::get('/Academicblock', [YourController::class, 'Academicblock'])->name('Academicblock');
    Route::get('/campusmap', [YourController::class, 'campusmap'])->name('campusmap');
});


// Careers Routes
Route::prefix('careers')->name('careers.')->group(function () {
    Route::get('/opportunities', function () {
        return view('careers.opportunities');
    })->name('opportunities');
    
    Route::get('/internships', function () {
        return view('careers.internships');
    })->name('internships');
    
    Route::get('/benefits', function () {
        return view('careers.benefits');
    })->name('benefits');
    Route::get('/application', function () {
        return view('careers.application');
    })->name('application');
    Route::get('/faqs', function () {
        return view('careers.faqs');
    })->name('faqs');
});

//ContactUs
Route::prefix('ContactUs')->name('ContactUs.')->group(function () {
    Route::get('/Contactus', [YourController::class, 'contactus'])->name('Contactus');
    Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');
});

// External Important Links
Route::get('/links/ura-saccos', function () {
    return redirect()->away('https://www.ura-saccos.go.tz');
})->name('links.ura-saccos');

Route::get('/links/jeshi-wananchi', function () {
    return redirect()->away('https://www.tpdf.mil.tz');
})->name('links.jeshi-wananchi');

Route::get('/links/zimamoto', function () {
    return redirect()->away('https://www.frs.go.tz');
})->name('links.zimamoto');

Route::get('/links/immigration', function () {
    return redirect()->away('https://www.immigration.go.tz');
})->name('links.immigration');

// External Useful Links
Route::get('/links/moha', function () {
    return redirect()->away('https://www.moha.go.tz');
})->name('links.moha');

Route::get('/links/nida', function () {
    return redirect()->away('https://www.nida.go.tz');
})->name('links.nida');

// TPS Login route
Route::get('/tps/login', function () {
    return redirect()->away('https://tps.go.tz/login');
})->name('tps.login');

Route::get('/links/tamisemi', function () {
    return redirect()->away('https://www.tamisemi.go.tz');
})->name('links.tamisemi');

// Admin Routes
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Events
Route::get('/events/{id}', [EventController::class, 'show'])->name('events-detail');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

// Newsletter subscription route
Route::post('/newsletter/subscribe', [App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');


// Internship 
Route::get('/internships', [InternshipController::class, 'index'])->name('internships.index');
Route::get('/internships/apply/{id}', [InternshipController::class, 'apply'])->name('internships.apply');
Route::post('/internships/submit', [InternshipController::class, 'submit'])->name('internships.submit');

//TPF Jobs
Route::get('/tpf-jobs', [TPFRecruitmentController::class, 'index'])->name('tpf.jobs');
Route::get('/tpf-apply/{category}', [TPFRecruitmentController::class, 'apply'])->name('tpf.apply');

// Main services page
Route::get('/services', 'App\Http\Controllers\ServiceController@index')->name('services.index');

// Individual service pages
Route::get('/services/driving-school', 'App\Http\Controllers\ServiceController@drivingSchool')->name('services.driving');
Route::get('/services/health-center', 'App\Http\Controllers\ServiceController@healthCenter')->name('services.health');
Route::get('/services/poetry', 'App\Http\Controllers\ServiceController@poetry')->name('services.poetry');
Route::get('/services/dogs-horses', 'App\Http\Controllers\ServiceController@dogsHorses')->name('services.animals');
Route::get('/services/catering', 'App\Http\Controllers\ServiceController@catering')->name('services.catering');

//Archivements
Route::get('/about/achievements', function () {
    return view('about.achievements');
})->name('about.achievements');