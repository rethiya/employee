@extends('layouts.master')

@section('content')

        <h1>Students</h1>

        <br/>

        <a href = "{{ route('student.create') }}"><button class = "btn btn-primary" type = "button">Add New Entry</button></a>

        <br/><br/>

        <table class = "table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Reporting Teacher</th>
                    <th>Action</th>
                   
                </tr>
            </thead>
            @php $i=1 @endphp
            <tbody>
                @foreach($students as $student)  

		                <tr class = "tableBody">
		                    <td>{{ $i }}</td>
		                    <td>{{ $student->name }}</td>
		                    <td>{{ $student->age }}</td>
		                    <td>{{ $student->gender }}</td>
		                    <td>{{ $student->teacher }}</td>
		                                                             
		                    <td class = "edit"><a class = "btn btn-success" href="{{ route('student.edit', $student->id) }}">Edit</a></td>
		                    <td class = "delete"><a class ="btn btn-danger" onclick = "return confirm('Are you sure?')" href="{{ route('student.delete', $student->id) }}">Delete</a></td>
		                </tr>  

	                @php $i++; @endphp
	            @endforeach                         
              
            </tbody>

        </table>

@endsection