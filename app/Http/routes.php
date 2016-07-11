<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/student/update', 'StudentController@getUpdateStudent');

Route::post('/student/update', 'StudentController@postUpdateStudent');

Route::put('/student/update', 'StudentController@putUpdateStudent');

Route::get('/teacher/create', 'TeacherController@getCreateTeacher');

Route::post('/teacher/create', 'TeacherController@postCreateTeacher');

Route::get('/student/create', 'StudentController@getCreateStudent');

Route::post('/student/create', 'StudentController@postCreateStudent');

Route::get('/course', 'CourseController@getInputCourse');

Route::post('/course', 'CourseController@postOneCourse');

Route::get('/teacher', 'TeacherController@getInputTeacher');

Route::post('/teacher', 'TeacherController@postOneTeacher');

Route::get('/student', 'StudentController@getInputStudent');

Route::post('/student', 'StudentController@postOneStudent');

Route::get('/teachers', 'TeacherController@getAllTeachers');

Route::get('/courses', 'CourseController@getAllCourses');

Route::get('/students', 'StudentController@getAllStudents');


Route::get('/', function () {
    return view('main');
});
