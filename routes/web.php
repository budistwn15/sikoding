<?php

use App\Http\Controllers\SkillController;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes(['verify' => true]);

Route::get('/', 'BerandaController@index')->name('index');
Route::view('/bantuan', 'front-end.bantuan')->name('bantuan');
Route::prefix('skills')->namespace('Front')->group(function () {
    Route::get('{skill:name}', 'SkillFrontController@index')->name('front.skill.index');
});

Route::prefix('courses')->middleware('auth')->namespace('Front')->group(function () {
    Route::get('all', 'FrontCourseController@all')->name('front.course.all');
    Route::get('{course:slug}', 'FrontCourseController@index')->name('front.course.index');
    Route::get('{course:slug}/theories/', 'FrontCourseController@theories')->name('front.theories.index');
    Route::get('{course:slug}/theories/{theory}', 'FrontCourseController@detail')->name('front.theories.detail');
    Route::get('{course:slug}/projects/{project}', 'FrontCourseController@projects')->name('front.project.index');
    Route::post('{course:slug}/projects/{project}/create', 'FrontCourseController@projectsCreate')->name('front.project.create');
});

Route::get('certificate', 'Front\CertificateController@index')->name('front.certificate.index');
Route::get('certificate/search', 'Front\CertificateController@search')->name('front.certificate.search');
Route::get('certificate_pdf/{certificate}', 'Front\CertificateController@printCertificate')->name('front.certificate.print');

Route::prefix('testimoni')->middleware('auth')->group(function () {
    Route::get('index', 'Front\TestimoniController@index')->name('testimoni.index');
    Route::post('index', 'Front\TestimoniController@store')->name('testimoni.create');
});


// BackEnd
Route::middleware('has.role')->prefix('sk-admin')->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::prefix('role-and-permission')->namespace('Permissions')->middleware('permission:assign permission')->group(function () {

        Route::get('assignable', 'AssignController@create')->name('assign.create');
        Route::post('assignable', 'AssignController@store');
        Route::get('assignable/{role}/edit', 'AssignController@edit')->name('assign.edit');
        Route::put('assignable/{role}/edit', 'AssignController@update');

        // user
        Route::get('assign/user', 'UserController@create')->name('assign.user.create');
        Route::post('assign/user', 'UserController@store');
        Route::get('assign/{user}/user', 'UserController@edit')->name('assign.user.edit');
        Route::put('assign/{user}/user', 'UserController@update');

        Route::prefix('roles')->group(function () {
            Route::get('', 'RoleController@index')->name('roles.index');
            Route::post('create', 'RoleController@store')->name('roles.create');
            Route::get('{role}/edit', 'RoleController@edit')->name('roles.edit');
            Route::put('{role}/edit', 'RoleController@update');
            Route::get('{role}/delete', 'RoleController@delete')->name('roles.delete');
        });

        Route::prefix('permissions')->group(function () {
            Route::get('', 'PermissionController@index')->name('permissions.index');
            Route::post('create', 'PermissionController@store')->name('permissions.create');
            Route::get('{permission}/edit', 'PermissionController@edit')->name('permissions.edit');
            Route::put('{permission}/edit', 'PermissionController@update');
            Route::get('{permission}/delete', 'PermissionController@delete')->name('permissions.delete');
        });
    });

    Route::prefix('navigation')->middleware('permission:create navigation')->group(function () {
        Route::get('create', 'NavigationController@create')->name('navigation.create');
        Route::post('create', 'NavigationController@store');
        Route::get('table', 'NavigationController@table')->name('navigation.table');
        Route::get('{navigation}/edit', 'NavigationController@edit')->name('navigation.edit');
        Route::put('{navigation}/edit', 'NavigationController@update');
        Route::delete('{navigation}/delete', 'NavigationController@destroy')->name('navigation.delete');
    });

    Route::prefix('skills')->middleware('permission:show skills')->group(function () {
        Route::get('', 'SkillController@index')->name('skills.index');
        Route::get('create', 'SkillController@create')->name('skills.create');
        Route::post('create', 'SkillController@store');
        Route::get('{skill}/edit', 'SkillController@edit')->name('skills.edit');
        Route::put('{skill}/edit', 'SkillController@update');
        Route::delete('{skill}/delete', 'SkillController@destroy')->name('skills.delete');
    });

    Route::prefix('courses')->middleware('permission:show courses')->group(function () {
        Route::get('', 'CourseController@index')->name('courses.index');
        Route::get('{course}/detail', 'CourseController@detail')->name('courses.detail');
        Route::get('create', 'CourseController@create')->name('course.create');
        Route::post('create', 'CourseController@store');
        Route::get('{course}/edit', 'CourseController@edit')->name('course.edit');
        Route::put('{course}/edit', 'CourseController@update');
        Route::delete('{course}/delete', 'CourseController@destroy')->name('course.delete');

        Route::prefix('{course:slug}/theories')->group(function () {
            Route::get('create', 'TheoryController@create')->name('theories.create');
            Route::post('create', 'TheoryController@store');
            Route::get('{theories}/edit', 'TheoryController@edit')->name('theories.edit');
            Route::put('{theories}/edit', 'TheoryController@update');
        });

        Route::prefix('{course:slug}/tools')->group(function () {
            Route::get('create', 'ToolController@create')->name('tools.create');
            Route::post('create', 'ToolController@store');
            Route::get('{tools}/edit', 'ToolController@edit')->name('tools.edit');
            Route::put('{tools}/edit', 'ToolController@update');
            Route::delete('{tools}/delete', 'ToolController@destroy')->name('tools.delete');
        });

        Route::prefix('{course:slug}/projects')->group(function () {
            Route::get('create', 'ProjectController@create')->name('projects.create');
            Route::post('create', 'ProjectController@store');
        });

        Route::prefix('theories')->group(function () {
            Route::get('{theories}/detail', 'TheoryController@detail')->name('theories.detail');
        });

        Route::prefix('{theories}/videos')->group(function () {
            Route::get('create', 'VideoController@create')->name('videos.create');
            Route::post('create', 'VideoController@store');
        });

        Route::prefix('videos')->group(function () {
            Route::get('{videos}/detail', 'VideoController@detail')->name('videos.detail');
        });
    });
    Route::prefix('projects')->middleware('permission:show courses')->group(function () {
        Route::get('', 'CourseProjectController@index')->name('course.project.index');
        Route::post('create', 'CourseProjectController@store')->name('course_project.create');
    });
});





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
