<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\TeacherDocumentController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\OldDocumentController;
use App\Http\Controllers\OldDocumentControllerTeacher;


//Route::get('/', function () {
//return view('welcome');
//});



Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);




    Route::group(['middleware' => 'admin'], function () 
{
    Route::get('admin/dashbroad', [DashboardController::class, 'dashbroad']);

    Route::get('admin/teacher/list', [AdminController::class, 'list']);
    Route::get('admin/teacher/add', [AdminController::class, 'add']);
    Route::post('admin/teacher/add', [AdminController::class, 'insert']);
    Route::get('admin/teacher/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/teacher/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/teacher/delete/{id}', [AdminController::class, 'delete']);

    Route::get('admin/document/view/{id}', [DocumentController::class, 'document_view']);
    Route::get('admin/dashbroad', [DocumentController::class, 'document_dashbroad']);
    Route::get('admin/document/list', [DocumentController::class, 'document_list']);
    Route::get('admin/document/add', [DocumentController::class, 'document_add']);

    Route::post('admin/document/add', [DocumentController::class, 'document_insert']);
    Route::get('admin/document/edit/{id}', [DocumentController::class, 'document_edit']);
    Route::post('admin/document/edit/{id}', [DocumentController::class, 'document_update']);
    Route::get('admin/document/delete/{id}', [DocumentController::class, 'document_delete']);

    Route::get('admin/document/old/version/{id}', [OldDocumentController::class, 'document_old']);  
    Route::get('admin/document/old/view/{id}', [OldDocumentController::class, 'document_old_view']);
    Route::post('admin/document/old/version/{id}', [OldDocumentController::class, 'document_compare']);  

    Route::get('admin/document/print/{id}', [DocumentController::class, 'document_print']);

    Route::get('admin/change_password', [UserController::class, 'change_password']); 
    Route::post('admin/change_password', [UserController::class, 'update_change_password']);
    
});




Route::group(['middleware' => 'teacher'], function () 
{

    Route::get('teacher/change_password', [UserController::class, 'change_password']); 
    Route::post('teacher/change_password', [UserController::class, 'update_change_password']);

    Route::get('teacher/document/view/{id}', [TeacherDocumentController::class, 'document_view']);
    Route::get('teacher/dashbroad', [TeacherDocumentController::class, 'document_dashbroad']);
    Route::get('teacher/document/list', [TeacherDocumentController::class, 'document_list']);
    Route::get('teacher/document/add', [TeacherDocumentController::class, 'document_add']);

    Route::post('teacher/document/add', [TeacherDocumentController::class, 'document_insert']);
    Route::get('teacher/document/edit/{id}', [TeacherDocumentController::class, 'document_edit']);
    Route::post('teacher/document/edit/{id}', [TeacherDocumentController::class, 'document_update']);
    Route::get('teacher/document/delete/{id}', [TeacherDocumentController::class, 'document_delete']);

    Route::get('teacher/document/old/version/{id}', [OldDocumentControllerTeacher::class, 'document_old']);  
    Route::get('teacher/document/old/view/{id}', [OldDocumentControllerTeacher::class, 'document_old_view']);
    Route::post('teacher/document/old/version/{id}', [OldDocumentControllerTeacher::class, 'document_compare']);  

    Route::get('teacher/document/print/{id}', [TeacherDocumentController::class, 'document_print']);
    
});



Route::group(['middleware' => 'guest'], function () 
{
    Route::get('guest/dashbroad', [GuestController::class, 'dashbroad']);
    Route::get('guest/print/{id}', [GuestController::class, 'document_print']);
    Route::get('guest/view/{id}', [GuestController::class, 'document_view']);
});