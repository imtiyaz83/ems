<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\TalkProposalController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('home');
});

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
    Route::get('/talk-proposal', function () {
        return view('talk_proposal_form');
    })->middleware('auth');
    Route::get('/proposal-list', [TalkProposalController::class, 'index'])->name('index')->middleware('auth');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

});

// Route to display the registration form
Route::get('/register', [SpeakerController::class, 'getRegister'])->name('register');
// Route to handle form submission and registration
Route::post('/register', [SpeakerController::class, 'store'])->name('register.store');

// Define the login routes
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.show');

Route::post('/speakers', [SpeakerController::class, 'store'])->name('speakerTest');
Route::post('/talk-proposals', [TalkProposalController::class, 'store'])->name('talkProposals.store');
Route::post('/talkproposals', [TalkProposalController::class, 'testtalkTest'])->name('talkProposals.talkTest');
Route::post('/speaker-test', [SpeakerController::class, 'speakerTest'])->name('speakerTest');
Route::post('/talk-proposal', [TalkProposalController::class, 'speakers'])->name('speakers.store');
Route::get('/proposals/{speaker_id}', [TalkProposalController::class, 'listProposals'])->name('proposals.list');




