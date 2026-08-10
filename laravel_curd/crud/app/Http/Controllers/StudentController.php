<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return view('students.index',compact('students'));
    }
    public function store(Request $request){
        Student::create($request->all());
        return redirect()->back();
    }
    public function update(Request $request, Student $student){
        $student->update($request->all());
        return redirect()->back();
    }
    public function destroy(Student $student){
        $student->delete();
        return redirect()->back();
    }
}
