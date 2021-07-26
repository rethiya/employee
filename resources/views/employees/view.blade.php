@extends('layouts.master')

@section('content')

        <h1>Students</h1>

        <br/>

        <a href = "{{ route('employee.create') }}"><button class = "btn btn-primary" type = "button">Add New Entry</button></a>

        <br/><br/>

        <table class="table table-bordered yajra-datatable" id="employee-datatable">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Position</th>
                    <th>Date</th>
                    <th>Action</th>
                   
                </tr>
            </thead>
          
            <tbody>
                               
              
            </tbody>

        </table>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
@endsection
