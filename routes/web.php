<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/api/users', [App\Http\Controllers\HomeController::class, 'fetchUsers']);

Route::get('/api/contacts/{user_id}', [App\Http\Controllers\ContactController::class, 'fetchContacts']);

Route::get('/contacts/create', [App\Http\Controllers\ContactController::class, 'create'])->name('contacts.create');

Route::get('/contacts/{id}/edit', [App\Http\Controllers\ContactController::class, 'edit'])->name('contacts.edit');

Route::delete('/contacts/{id}', [App\Http\Controllers\ContactController::class, 'delete'])->name('contacts.delete');

Route::put('/contacts/{id}', [App\Http\Controllers\ContactController::class, 'update'])->name('contacts.update');

Route::get('/contacts/{id}', [App\Http\Controllers\ContactController::class, 'show'])->name('contacts.show');

Route::post('/contacts', [App\Http\Controllers\ContactController::class, 'store'])->name('contacts.store');
