<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\TPFRecruitmentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\UndergraduateProgramsController;
use App\Http\Controllers\GraduateAdmissionsController;
use App\Http\Controllers\UndergraduateAdmissionsController;
use App\Http\Controllers\TrainingProgramController;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\ProficiencyCoursesController;
use App\Http\Controllers\PromotionalCoursesController;
use App\Http\Controllers\SlidesController;


// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');


// News Routes
Route::prefix('news')->name('news.')->group(function () {
    // Main index route
    Route::get('/', [NewsController::class, 'index'])->name('index');
    
    // Content type routes
    Route::get('/latest', [NewsController::class, 'latest'])->name('latest');
    
    Route::get('/upcoming', [EventController::class, 'upcoming'])->name('upcoming');

    Route::get('/announcements', [NewsController::class, 'announcements'])->name('announcements');
    
    // Category route
    Route::get('/category/{slug}', [NewsController::class, 'byCategory'])->name('category');
    
    // Show single news article - this should be last to avoid conflicts
    Route::get('/{id}', [NewsController::class, 'show'])->name('show');
});
// Event Routes
Route::prefix('events')->name('events.')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('index');
    Route::get('/upcoming', [EventController::class, 'upcomingEvents'])->name('upcoming');
    Route::get('/{id}', [EventController::class, 'show'])->name('show');
    Route::post('/{id}/register', [EventController::class, 'register'])->name('register');
});

// About Routes
Route::prefix('about')->name('about.')->group(function () {
    Route::get('/history', [HistoryController::class, 'index'])->name('history');
    Route::get('/history/{month}', [HistoryController::class, 'showMonth'])->name('history.month');
    Route::get('/mission', [HomeController::class, 'mission'])->name('mission');
    Route::get('/leadership', [LeaderController::class, 'index'])->name('leadership');
    Route::get('/leadership/{slug}', [LeaderController::class, 'show'])->name('leadership.show');
    Route::get('/achievements', function () {
        return view('about.achievements');
    })->name('achievements');
});

// Facilities Routes
Route::prefix('facilities')->name('facilities.')->group(function () {
    Route::get('/sports', [SportsController::class, 'index'])->name('sports');
    Route::get('/training', [TrainingProgramController::class, 'index'])->name('training');
    Route::get('/library', [HomeController::class, 'library'])->name('library');
});

// Services Routes
Route::prefix('services')->name('services.')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('index');
    Route::get('/driving-school', [ServiceController::class, 'drivingSchool'])->name('driving');
    Route::get('/health-center', [ServiceController::class, 'healthCenter'])->name('health');
    Route::get('/poultry', [ServiceController::class, 'poultry'])->name('poultry');
    Route::get('/dogs-horses', [ServiceController::class, 'dogsHorses'])->name('animals');
    Route::get('/catering', [ServiceController::class, 'catering'])->name('catering');
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

// Contact Us Routes
Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::post('/submit', [ContactController::class, 'submit'])->name('submit');
});

// External Important Links
Route::prefix('links')->name('links.')->group(function () {
    Route::get('/ura-saccos', function () {
        return redirect()->away('https://www.ura-saccos.go.tz');
    })->name('ura-saccos');
    
    Route::get('/jeshi-wananchi', function () {
        return redirect()->away('https://www.tpdf.mil.tz');
    })->name('jeshi-wananchi');
    
    Route::get('/zimamoto', function () {
        return redirect()->away('https://www.frs.go.tz');
    })->name('zimamoto');
    
    Route::get('/immigration', function () {
        return redirect()->away('https://www.immigration.go.tz');
    })->name('immigration');
    
    Route::get('/moha', function () {
        return redirect()->away('https://www.moha.go.tz');
    })->name('moha');
    
    Route::get('/nida', function () {
        return redirect()->away('https://www.nida.go.tz');
    })->name('nida');
    
    Route::get('/tamisemi', function () {
        return redirect()->away('https://www.tamisemi.go.tz');
    })->name('tamisemi');
});

// TPS Login route
Route::get('/tps/login', function () {
    return redirect()->away('https://tps.go.tz/login');
})->name('tps.login');

// Internship Routes
Route::prefix('internships')->name('internships.')->group(function () {
    Route::get('/', [InternshipController::class, 'index'])->name('index');
    Route::get('/apply/{id}', [InternshipController::class, 'apply'])->name('apply');
    Route::post('/submit', [InternshipController::class, 'submit'])->name('submit');
});

// TPF Recruitment Routes
Route::prefix('tpf')->name('tpf.')->group(function () {
    Route::get('/jobs', [TPFRecruitmentController::class, 'index'])->name('jobs');
    Route::get('/apply/{category}', [TPFRecruitmentController::class, 'apply'])->name('apply');
});

// Admissions Routes
Route::prefix('admissions')->name('admissions.')->group(function () {
    // Undergraduate Routes
    Route::get('/undergraduate', [UndergraduateAdmissionsController::class, 'index'])->name('undergraduate');
    Route::post('/undergraduate/apply', [UndergraduateProgramsController::class, 'submitApplication'])->name('undergraduate.apply');
    
    // Graduate Routes
    Route::get('/graduate', [GraduateAdmissionsController::class, 'index'])->name('graduate');
    Route::post('/graduate/apply', [GraduateAdmissionsController::class, 'submitApplication'])->name('graduate.apply');
});

Route::get('/admissions/graduate/apply', [GraduateAdmissionsController::class, 'graduateApply'])
    ->name('admissions.graduate-apply');

// In routes/web.php
Route::get('/programes', [HomeController::class, 'programes'])->name('programes.index');
Route::get('/admissions/programes', [HomeController::class, 'programes'])
     ->name('admissions.programes');

     Route::get('/proficiency-courses', [App\Http\Controllers\ProficiencyCoursesController::class, 'index'])
     ->name('admissions.proficiency-courses');     

// Timeline Routes
Route::prefix('timeline')->name('timeline.')->group(function () {
    Route::get('/', [TimelineController::class, 'index'])->name('index');
    Route::get('/event/{year}', [TimelineController::class, 'showEvent'])->name('event');
    Route::get('/api/data', [TimelineController::class, 'getTimelineData'])->name('data');
});

// Promotional Courses routes
Route::get('/promotional-courses', [PromotionalCoursesController::class, 'index'])->name('police.promotional-courses');
Route::get('/promotional-courses/download-application', [PromotionalCoursesController::class, 'downloadApplication'])->name('police.download-application');

// API Routes
Route::prefix('api')->name('api.')->group(function () {
    Route::get('/voyager/announcements', [NewsController::class, 'getAnnouncements'])->name('announcements');
    Route::get('/voyager/news', [NewsController::class, 'getNews'])->name('news');
    Route::get('/voyager/events', [NewsController::class, 'getEvents'])->name('events');
    Route::get('/content/{slug}', [TimelineController::class, 'getContent'])->name('content');
    Route::get('/voyager/slides', [SlidesController::class, 'getSlides'])->name('slides');
});

// Newsletter subscription route
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Admin Routes
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/events/{id}/registrations', [EventController::class, 'eventRegistrations']);
});