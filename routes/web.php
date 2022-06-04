<?php

use Illuminate\Support\Facades\{Route, Auth};

use App\Http\Controllers\{
    HomeController,
    AdminController,
    CaseHistoryController,
    CaseOfficeController,
    CrimeCaseController,
    CrimeResultController,
    EvidenceController,
    OfficerController,
    SuspectController
};

Route::view('/', 'welcome');

Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('officer', OfficerController::class);
    Route::resource('cases', CrimeCaseController::class);
    Route::get('view-suspect/{id}', [SuspectController::class, 'AdminIndex'])->name('suspects.index');
    Route::get('case-officer', [CaseOfficeController::class, 'index'])->name('case-officer.index');
    Route::get('case-officer/add-officer/{id}', [CaseOfficeController::class, 'create'])->name('case-officer.create');
    Route::post('case-officer/store-officer/{id}', [CaseOfficeController::class, 'store'])->name('case-officer.store');

    Route::get('case-history', [CaseHistoryController::class, 'adminIndex'])->name('history.index');
    Route::get('case-history/{id}', [CaseHistoryController::class, 'adminShow'])->name('history.show');

    Route::get('add-result/', [CrimeResultController::class, 'index'])->name('result.index');
    Route::get('add-result/create/{id}', [CrimeResultController::class, 'create'])->name('result.create');
    Route::post('add-result/store/{id}', [CrimeResultController::class, 'store'])->name('result.store');

    Route::get('/predict-result-cases', [AdminController::class, 'predictIndex'])->name('predict.index');
    Route::get('/predict-result-cases/{id}', [AdminController::class, 'predictShow'])->name('predict.show');
});

Route::middleware(['auth', 'officer'])->prefix('officer')->as('officer.')->group(function () {
    Route::get('/', [OfficerController::class, 'officerIndex'])->name('index');
    Route::get('suspects', [SuspectController::class, 'index'])->name('suspects.index');
    Route::get('suspects/create/{id}', [SuspectController::class, 'create'])->name('suspects.create');
    Route::post('suspects/{id}', [SuspectController::class, 'store'])->name('suspects.store');
    Route::get('suspects/{id}', [SuspectController::class, 'show'])->name('suspects.show');
    Route::get('suspects/edit/{id}', [SuspectController::class, 'edit'])->name('suspects.edit');
    Route::put('suspects/{id}/update', [SuspectController::class, 'update'])->name('suspects.update');
    Route::delete('suspects/{id}/delete', [SuspectController::class, 'destroy'])->name('suspects.destroy');

    Route::get('evidences', [EvidenceController::class, 'index'])->name('evidences.index');
    Route::get('evidences/create/{id}', [EvidenceController::class, 'create'])->name('evidences.create');
    Route::post('evidences/{id}', [EvidenceController::class, 'store'])->name('evidences.store');
    Route::get('evidences/{id}', [EvidenceController::class, 'show'])->name('evidences.show');
    Route::get('evidences/edit/{id}', [EvidenceController::class, 'edit'])->name('evidences.edit');
    Route::put('evidences/{id}/update', [EvidenceController::class, 'update'])->name('evidences.update');
    Route::delete('evidences/{id}/delete', [EvidenceController::class, 'destroy'])->name('evidences.destroy');

    Route::get('case-history', [CaseHistoryController::class, 'index'])->name('history.index');
    Route::get('case-history/{id}', [CaseHistoryController::class, 'show'])->name('history.show');
});
