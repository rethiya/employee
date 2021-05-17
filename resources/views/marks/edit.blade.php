@extends('layouts.master')


@section('content')

 <div class="container mt-5">

        <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <form method="post" action="{{ route('mark.update',request()->id) }}">

            <!-- CROSS Site Request Forgery Protection -->
            @csrf

            <div class="form-group">
                <label>Student</label>
                <select class="form-control" name="student_id">
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ $student->id == $mark->student_id ? 'selected' : '' }}>{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Maths</label>
                <input type="text" class="form-control {{ $errors->has('maths') ? 'error' : '' }}" name="maths" value="{{ $mark->maths }}">

		        <!-- Error -->
		        @if ($errors->has('maths'))
		        <div class="error alert alert-danger">
		            {{ $errors->first('maths') }}
		        </div>
		        @endif
               
            </div>

            <div class="form-group">
                <label>Science</label>
                <input type="text" class="form-control {{ $errors->has('science') ? 'error' : '' }}" name="science" value="{{ $mark->science }}">

		        @if ($errors->has('science'))
		        <div class="error alert alert-danger">
		            {{ $errors->first('science') }}
		        </div>
		        @endif
            </div>

            <div class="form-group">
                <label>History</label>
                 <input type="text" class="form-control {{ $errors->has('history') ? 'error' : '' }}" name="history" value="{{ $mark->history }}">

		        @if ($errors->has('history'))
		        <div class="error alert alert-danger">
		            {{ $errors->first('history') }}
		        </div>
		        @endif
            </div>

            <div class="form-group">
                <label>Term</label>
                <select class="form-control" name="term">
                    <option {{ ($mark->term == 'One') ? 'selected' : '' }}>One</option>
                    <option {{ ($mark->term == 'Two') ? 'selected' : '' }}>Two</option>
                    <option {{ ($mark->term == 'Three') ? 'selected' : '' }}>Three</option>
                    <option {{ ($mark->term == 'Four') ? 'selected' : '' }}>Four</option>
                </select>
            </div>

            <div class="form-group">
                <label>Total Marks</label>
                 <input type="text" class="form-control {{ $errors->has('total') ? 'error' : '' }}" name="total" value="{{ $mark->total }}">

                @if ($errors->has('total'))
                <div class="error alert alert-danger">
                    {{ $errors->first('total') }}
                </div>
                @endif
            </div>


            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </form>
    </div>



@endsection