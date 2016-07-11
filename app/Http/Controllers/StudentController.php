<?php

namespace HttpClient\Http\Controllers;

use Illuminate\Http\Request;

use HttpClient\Http\Requests;

class StudentController extends ClientController
{
    public function getAllStudents()
    {
    	$students = $this->obtainAllStudents();

    	return view('students.all-students', ['students' => $students]);
    }

    public function getInputStudent()
    {
    	return view('students.input-student');
    }

    public function postOneStudent(Request $request)
    {
    	$this->validate($request, ['studentId' => 'required|numeric']);

    	$studentId = $request->get('studentId');
    	$student = $this->obtainOneStudent($studentId);

    	return view('students.one-student', ['student' => $student]);
    }

    public function getCreateStudent()
    {
        return view('students.create-student');
    }

    public function postCreateStudent(Request $request)
    {
        $message = $this->createOneStudent($request->all());

        return redirect('/students')->with('success', $message);
    }

    public function getUpdateStudent()
    {
        $students = $this->obtainAllStudents();
        return view('students.select-student', ['students' => $students]);
    }

    public function postUpdateStudent(Request $request)
    {
        $studentId = $request->get('studentId');

        $student = $this->obtainOneStudent($studentId);

        return view('students.update-student', ['student' => $student]);
    }

    public function putUpdateStudent(Request $request)
    {
        $message = $this->updateOneStudent($request->all());

        return redirect('/students')->with('success', $message);
    }

    public function getRemoveStudent()
    {
        $students = $this->obtainAllStudents();
        return view('students.select-remove-student', ['students' => $students]);
    }

    public function postRemoveStudent(Request $request)
    {
        $studentId = $request->get('studentId');

        $student = $this->obtainOneStudent($studentId);

        return view('students.confirm-remove-student', ['student' => $student]);
    }

    public function deleteRemoveStudent(Request $request)
    {
        $message = $this->removeOneStudent($request->all());

        return redirect('/students')->with('success', $message);
    }
}
