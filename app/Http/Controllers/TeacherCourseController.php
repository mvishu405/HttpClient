<?php

namespace HttpClient\Http\Controllers;

use Illuminate\Http\Request;

use HttpClient\Http\Requests;

class TeacherCourseController extends ClientController
{
	public function getShowAllTeachers()
	{
		$teachers = $this->obtainAllTeachers();

		return view('teacher-course.select-teacher', ['teachers' => $teachers]);
	}

	public function postShowTeacherCourses(Request $request)
	{
		$teacherId = $request->get('teacherId');

		$courses = $this->obtainTeacherCourses($teacherId);

		return view('teacher-course.show-teacher-courses', ['courses' => $courses]);
	}
}
