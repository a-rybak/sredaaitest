<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;

Route::get('/', [CertificateController::class, 'create']);
Route::post('/create-pdf', [CertificateController::class, 'store'])->name('create-pdf');
