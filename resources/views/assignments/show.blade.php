@extends('layouts.app')

@section('title')
@endsection

@section('content')


<div class="pull-right">

    <a class="btn btn-primary" href="{{ route('assignments.index') }}"> Back</a>

</div>

<table class="table table-bordered" width = "500px">

<tr>

    <th width="100px">Due to</th>

    <th width="400px">File</th>

</tr>


<tr>

    <td>{{ $assignment->due_to }}</td>

    <td><a href="{{ url('download', $assignment->filename) }}">{{ $assignment->filename }}</a></td>


</tr>


</table>

<table class="table table-bordered">

<tr>

    <th width="280px">Time submit</th>

    <th>File</th>

    <th width="280px">Student</th>

</tr>

@foreach ($submissions as $submission)

<tr>

    <td>{{ $submission->created_at }}</td>

    <td><a href="{{ url('download', $submission->filename) }}">{{ $submission->filename }}</a></td>

    <td>{{ $submission->student_id }}</td>

</tr>

@endforeach

</table>

@endsection