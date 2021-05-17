@extends('layouts.master')


@section('content')

 <div class="container mt-5">

        <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <form method="post" action="{{ route('student.update',request()->id) }}">

            <!-- CROSS Site Request Forgery Protection -->
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" value="{{ $student->name }}">

		        <!-- Error -->
		        @if ($errors->has('name'))
		        <div class="error alert alert-danger">
		            {{ $errors->first('name') }}
		        </div>
		        @endif
               
            </div>

            <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control {{ $errors->has('age') ? 'error' : '' }}" name="age" value="{{ $student->age }}">

		        @if ($errors->has('age'))
		        <div class="error alert alert-danger">
		            {{ $errors->first('age') }}
		        </div>
		        @endif
            </div>

            <div class="form-group">
                <label>Gender</label>
                 <input type="text" class="form-control {{ $errors->has('gender') ? 'error' : '' }}" name="gender" value="{{ $student->gender }}">

		        @if ($errors->has('gender'))
		        <div class="error alert alert-danger">
		            {{ $errors->first('gender') }}
		        </div>
		        @endif
            </div>

            <div class="form-group">
                <label>Reporting Teacher</label>
                <select class="form-control" name="teacher">
                	<option {{ ($student->teacher == 'Maya') ? 'selected' : '' }}>Maya</option>
                	<option {{ ($student->teacher == 'Meera') ? 'selected' : '' }}>Meera</option>
                	<option {{ ($student->teacher == 'Lakshmi') ? 'selected' : '' }}>Lakshmi</option>
                </select>
            </div>

            

            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </form>
    </div>



@endsection