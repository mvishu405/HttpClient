<?php

namespace HttpClient\Http\Controllers;

use Illuminate\Http\Request;

use HttpClient\Http\Requests;

class TeacherController extends ClientController
{
    public function getAllTeachers()
    {
    	$teachers = $this->obtainAllTeachers();

    	return view('teachers.all-teachers', ['teachers' => $teachers]);
    }

    public function getInputTeacher()
    {
    	return view('teachers.input-teacher');
    }

    public function postOneTeacher(Request $request)
    {
    	$this->validate($request, ['teacherId' => 'required|numeric']);

    	$teacherId = $request->get('teacherId');
    	$teacher = $this->obtainOneTeacher($teacherId);

    	return view('teachers.one-teacher', ['teacher' => $teacher]);
    }

    public function getCreateTeacher()
    {
        return view('teachers.create-teacher');
    }

    public function postCreateTeacher(Request $request)
    {
        $message = $this->createOneteacher($request->all());

        return redirect('/teachers')->with('success', $message);
    }

    public function getUpdateTeacher()
    {
        $teachers = $this->obtainAllTeachers();
        return view('teachers.select-teacher', ['teachers' => $teachers]);
    }

    public function postUpdateTeacher(Request $request)
    {
        $teacherId = $request->get('teacherId');

        $teacher = $this->obtainOneTeacher($teacherId);

        return view('teachers.update-teacher', ['teacher' => $teacher]);
    }

    public function putUpdateTeacher(Request $request)
    {
        $message = $this->updateOneTeacher($request->all());

        return redirect('/teachers')->with('success', $message);
    }
}
