<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Yajra\DataTables\Facades\DataTables;


class EmployeesController extends Controller
{
    public function index(){
    	
    	return view('employees.view');
    }
    public function listEmployees(Request $request){

        $query = Employee::query();
        $result = $query->orderBy('created_at', 'desc');

        return DataTables::of($result)
            ->addIndexColumn()
            ->with([
                "recordsTotal" => Employee::count(),
                "recordsFiltered" =>  $query->count(),
            ])
            ->editColumn('name', function ($result) {
                return $result->name;               
            })
            ->editColumn('age', function ($result) {
               
                return $result->age;   
               
            })
            ->addColumn('gender', function ($result) {
                return $result->gender;
            })
            ->editColumn('address', function ($result) {
                return $result->address;
            })
            ->editColumn('position', function ($result) {
                return $result->position;
            })
            ->editColumn('created_at', function ($result) {
                return $result->created_at;
            })
            ->editColumn('actions', function ($result) {

                $editUrl    = route('employee.edit', $result->id);
                $deleteUrl  =  route('employee.delete', $result->id);

                $deleteaction = '<a href="'.$deleteUrl.'" class="btn btn-danger" title="Delete">Delete
                </a>';
                
                $editaction = '<a href ="'.$editUrl.'" class="btn btn-success" title="Edit">Edit</a>';

                return $editaction.' '.$deleteaction;

                return '---';
            })
            
            ->rawColumns(['index', 'name', 'age', 'gender', 'address', 'position','created_at','actions'])
            ->make(true);
    }
    public function create(){

    	return view('employees.create');
    }
    public function store(Request $request){

    	// Form validation
        $this->validate($request, [
            'name'    => 'required',
            'age'     => 'required|numeric',
            'gender'  => 'required',
            'address' => 'required',
            'position'=> 'required',
            'dob'     => 'required',
            
         ]);

        //  Store data in database
        Employee::create($request->all());
       

        return back()->with('success', 'Successfully added an Employee.');
    }
    public function edit($id){

    	$employee = Employee::find($id);
    	return view('employees.edit', compact('employee'));
    	
    }
    public function update($id,Request $request){

    	// Form validation
        $this->validate($request, [
            'name'     => 'required',
            'age'      => 'required|numeric',
            'gender'   => 'required',
            'address'  => 'required',
            'position' => 'required',
            'dob'     => 'required',
            
         ]);

        Employee::where('id', $id)
       ->update([
           'name'     => $request->name,
           'age'      => $request->age,
           'gender'   => $request->gender,
           'address'  => $request->address,
           'position' => $request->position,
           'dob'      => $request->dob,	
        ]);
       

        return back()->with('success', 'Successfully edited the employee.');
    }
    public function destroy($id){

    	Employee::find($id)->delete();
    	return \Redirect::back();
    }
 
   

}
