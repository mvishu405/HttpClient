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
Route::get('/teachers/courses/update', 'TeacherCourseController@getUpdateCourse');

Route::post('/teachers/courses/update', 'TeacherCourseController@postUpdateCourse');

Route::put('/teachers/courses/update', 'TeacherCourseController@putUpdateCourse');

Route::get('/courses/students/add', 'CourseStudentController@getAddStudent');

Route::post('/courses/students/add', 'CourseStudentController@postAddStudent');

Route::get('/teachers/courses/create', 'TeacherCourseController@getCreateCourse');

Route::post('/teachers/courses/create', 'TeacherCourseController@postCreateCourse');

Route::get('/teachers/courses', 'TeacherCourseController@getShowAllTeachers');

Route::post('/teachers/courses', 'TeacherCourseController@postShowTeacherCourses');

Route::get('/courses/students', 'CourseStudentController@getShowAllCourses');

Route::post('/courses/students', 'CourseStudentController@postShowCourseStudents');

Route::get('/teacher/remove', 'TeacherController@getRemoveTeacher');

Route::post('/teacher/remove', 'TeacherController@postRemoveTeacher');

Route::delete('/teacher/remove', 'TeacherController@deleteRemoveTeacher');

Route::get('/student/remove', 'StudentController@getRemoveStudent');

Route::post('/student/remove', 'StudentController@postRemoveStudent');

Route::delete('/student/remove', 'StudentController@deleteRemoveStudent');

Route::get('/teacher/update', 'TeacherController@getUpdateTeacher');

Route::post('/teacher/update', 'TeacherController@postUpdateTeacher');

Route::put('/teacher/update', 'TeacherController@putUpdateTeacher');

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
