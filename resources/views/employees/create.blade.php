@extends('layouts.master')


@section('content')

 <div class="container mt-5">

        <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <form method="post" action="{{ route('employee.store') }}">

            <!-- CROSS Site Request Forgery Protection -->
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" value="{{ old('name') }}">

		        <!-- Error -->
		        @if ($errors->has('name'))
		        <div class="error alert alert-danger">
		            {{ $errors->first('name') }}
		        </div>
		        @endif
               
            </div>

            <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control {{ $errors->has('age') ? 'error' : '' }}" name="age" value="{{ old('age') }}">

		        @if ($errors->has('age'))
		        <div class="error alert alert-danger">
		            {{ $errors->first('age') }}
		        </div>
		        @endif
            </div>

            <div class="form-group">
                <label>DOB</label>
                <input class="date form-control" type="text" name="dob" value="{{ old('dob') }}"">

                @if ($errors->has('address'))
                <div class="error alert alert-danger">
                    {{ $errors->first('dob') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Male<input type="radio" name="gender" value="M" checked></label>
                <label>Female<input type="radio" name="gender" value="F"></label>
            </div>


            <div class="form-group">
                <label>address</label>
                <textarea class="form-control" name="address"></textarea>

                @if ($errors->has('address'))
                <div class="error alert alert-danger">
                    {{ $errors->first('address') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Position</label>
                 <input type="text" class="form-control {{ $errors->has('position') ? 'error' : '' }}" name="position" value="{{ old('position') }}">

                @if ($errors->has('position'))
                <div class="error alert alert-danger">
                    {{ $errors->first('position') }}
                </div>
                @endif
            </div>

            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </form>
    </div>



@endsection