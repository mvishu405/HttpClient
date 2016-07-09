<?php

namespace HttpClient\Http\Controllers;

use Illuminate\Http\Request;

use HttpClient\Http\Requests;

class CourseController extends ClientController
{
    public function getAllCourses()
    {
    	$courses = $this->obtainAllCourses();

    	return view('courses.all-courses', ['courses' => $courses]);
    }
}
