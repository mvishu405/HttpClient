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

    public function getInputCourse()
    {
    	return view('courses.input-course');
    }

    public function postOneCourse(Request $request)
    {
    	$this->validate($request, ['courseId' => 'required|numeric']);

    	$courseId = $request->get('courseId');
    	$course = $this->obtainOnecourse($courseId);

    	return view('courses.one-course', ['course' => $course]);
    }
}
