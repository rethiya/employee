@extends('layouts.master')

@section('content')

        <h1>Students</h1>

        <br/>

        <a href = "{{ route('marks.create') }}"><button class = "btn btn-primary" type = "button">Add New Entry</button></a>

        <br/><br/>

        <table class = "table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Maths</th>
                    <th>Science</th>
                    <th>History</th>
                    <th>Term</th>
                    <th>Total Marks</th>
                    <th>Created On</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </thead>
            @php $i=1 @endphp
            <tbody>
                @foreach($marks as $mark)  

		                <tr class = "tableBody">
		                    <td>{{ $i }}</td>
		                    <td>{{ $mark->student->name }}</td>
		                    <td>{{ $mark->maths }}</td>
		                    <td>{{ $mark->science }}</td>
		                    <td>{{ $mark->history }}</td>
                            <td>{{ $mark->term }}</td>
                            <td>{{ $mark->total }}</td>
                            <td>{{ $mark->created_at->format('M d,Y h:i A') }}</td>
		                                                             
		                    <td class = "edit"><a class = "btn btn-success" href="{{ route('mark.edit', $mark->id) }}">Edit</a></td>
		                    <td class = "delete"><a class ="btn btn-danger" onclick = "return confirm('Are you sure?')" href="{{ route('mark.delete', $mark->id) }}">Delete</a></td>
		                </tr>  

	                @php $i++; @endphp
	            @endforeach                         
              
            </tbody>

        </table>

@endsection