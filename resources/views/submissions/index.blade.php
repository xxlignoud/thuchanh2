@extends('layouts.app')

@section('title')
    Assignments
@endsection

@section('content')
<div class="row">

<div class="col-lg-12 margin-tb">

    <div class="pull-left">

        <h2>List assignments</h2>

    </div>

</div>

</div>



@if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>

@endif



<table class="table table-bordered">

<tr>

    <th width="280px">Due to</th>

    <th>Description</th>

    <th width="280px">#</th>

</tr>

@foreach ($assignments as $assignment)

<tr>

    <td>{{ $assignment->due_to }}</td>

    <td>{{ $assignment->description }}</td>


    <td>

        <a class="btn btn-info" href="{{ route('submissions.show',$assignment->id) }}">detail</a>

    </td>

</tr>

@endforeach

</table>



{!! $assignments->links() !!}
@endsection