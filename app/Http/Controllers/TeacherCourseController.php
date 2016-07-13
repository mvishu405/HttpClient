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

	public function getCreateCourse()
	{
		$teachers = $this->obtainAllTeachers();

		return view('teacher-course.create-course', ['teachers' => $teachers]);
	}

	public function postCreateCourse(Request $request)
	{
		$message = $this->createOneCourse($request->all());

		return redirect('/courses')->with('success', $message);
	}

	public function getUpdateCourse()
    {
        $courses = $this->obtainAllCourses();
        return view('teacher-course.select-course', ['courses' => $courses]);
    }

    public function postUpdateCourse(Request $request)
    {
        $courseId = $request->get('courseId');
        $teachers = $this->obtainAllTeachers();
        $course = $this->obtainOneCourse($courseId);

        return view('teacher-course.update-course', ['course' => $course, 'teachers' => $teachers]);
    }

    public function putUpdateCourse(Request $request)
    {
        $message = $this->updateOneCourse($request->all());

        return redirect('/courses')->with('success', $message);
    }

    public function getRemoveCourse()
    {
        $courses = $this->obtainAllCourses();
        return view('teacher-course.select-course-remove', ['courses' => $courses]);
    }

    public function postRemoveCourse(Request $request)
    {
        $courseId = $request->get('courseId');
        $teachers = $this->obtainAllTeachers();
        $course = $this->obtainOneCourse($courseId);

        return view('teacher-course.remove-course', ['course' => $course, 'teachers' => $teachers]);
    }

    public function deleteRemoveCourse(Request $request)
    {
        $message = $this->removeOneCourse($request->all());

        return redirect('/courses')->with('success', $message);
    }
}
