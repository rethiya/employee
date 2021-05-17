<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Mark;


class StudentManagementController extends Controller
{
    public function index(){
    	
    	$students = Student::orderBy('created_at', 'desc')->get();

    	return view('students.view', compact('students'));
    }
    public function create(){

    	return view('students.create');
    }
    public function store(Request $request){

    	// Form validation
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required|numeric',
            'gender' => 'required',
            
         ]);

        //  Store data in database
        Student::create($request->all());
       

        return back()->with('success', 'Successfully added a student.');
    }
    public function edit($id){

    	$student = Student::find($id);
    	return view('students.edit', compact('student'));
    	
    }
    public function update($id,Request $request){

    	// Form validation
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required|numeric',
            'gender' => 'required',
            
         ]);

        Student::where('id', $id)
       ->update([
           'name'    => $request->name,
           'age'     => $request->age,
           'gender'  => $request->gender,
           'teacher' => $request->teacher	
        ]);
       

        return back()->with('success', 'Successfully edited the student.');
    }
    public function destroy($id){

    	Student::find($id)->delete();
    	return \Redirect::back();
    }
    public function addMarks(){

    	$students = Student::get();
    	return view('marks.create',compact('students'));
    }
    public function storeMarks(Request $request){

    	// Form validation
        $this->validate($request, [
            'maths'   => 'required|numeric',
            'science' => 'required|numeric',
            'history' => 'required|numeric',
            'total'   =>  'required'
            
         ]);

        //  Store data in database
        Mark::create($request->all());

    }
    public function listMarks(){

    	$marks = Mark::with('student')->get();
    	// print_r($marks);die();
    	return view('marks.list',compact('marks'));
    }
    public function editMark($id){

    	$mark = Mark::find($id);
    	$students = Student::get();
    	return view('marks.edit', compact('mark','students'));
    }
    public function updateMark($id,Request $request){

    	// Form validation
        $this->validate($request, [
            'maths'   => 'required|numeric',
            'science' => 'required|numeric',
            'history' => 'required|numeric',
            'total'   =>  'required'
            
         ]);

        Mark::where('id', $id)
       ->update([
           'student_id' => $request->student_id,
           'maths'      => $request->maths,
           'science'    => $request->science,
           'history'    => $request->history,
           'term'       => $request->term,
           'total'      => $request->total   
        ]);
       

        return back()->with('success', 'Successfully edited the student.');
    }
    public function markDelete($id){

    	Mark::find($id)->delete();
    	return \Redirect::back();
    }

}
