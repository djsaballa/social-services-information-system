<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware('auth')->group(function () {
  // LIST OF USERS
  Route::get('/list-of-users/{user_id}', [UserController::class, 'listOfUsers'])->name('list_of_users');
    
  // VIEW USER
  Route::get('/view-user/{user_id}/{employee_id}', [UserController::class, 'viewUser'])->name('view_user');

  // CHANGE PASSWORD
  Route::get('/change-password/{user_id}/{employee_id}', [UserController::class, 'changePassword'])->name('change_password');
  Route::get('/save-password/{user_id}/{employee_id}/{new_password}', [UserController::class, 'savePassword'])->name('save_password');

  // ADD USER
  Route::get('/add-user/{user_id}', [UserController::class, 'addUser'])->name('add_user');
  Route::post('/add-user-save', [UserController::class, 'addUserSave'])->name('add_user_save');

  // EDIT USER
  Route::get('/edit-user/{user_id}/{employee_id}', [UserController::class, 'editUser'])->name('edit_user');
  Route::post('/edit-user-save', [UserController::class, 'editUserSave'])->name('edit_user_save');

  // LIST OF ARCHIVE USER
  Route::get('/list-of-archive-users/{user_id}', [UserController::class, 'listOfArchiveUsers'])->name('list_of_archive_users');

  // VIEW ARCHIVE USER
  Route::get('/view-archive-user/{user_id}/{employee_id}', [UserController::class, 'viewArchiveUser'])->name('view_archive_user');

  // ARCHIVE ADN RESTORE USER
  Route::get('/archive-user/{user_id}/{employee_id}', [UserController::class, 'archiveUser'])->name('archive_user');
  Route::get('/restore-user/{user_id}/{employee_id}', [UserController::class, 'restoreUser'])->name('restore_user');
});