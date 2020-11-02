@extends('layouts.app')

@section('title')
    Assigments
@endsection

@section('content')
<div class="row">

<div class="col-lg-12 margin-tb">

    <div class="pull-left">

        <h2>List assignments</h2>

    </div>

    <div class="pull-right">

        <a class="btn btn-success" href="{{ route('assignments.create') }}">New</a>

    </div>

</div>

</div>




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

        <form action="{{ route('assignments.destroy',$assignment->id) }}" method="POST">

            <a class="btn btn-info" href="{{ route('assignments.show',$assignment->id) }}">detail</a>

            @csrf

            @method('DELETE')

            <button type="submit" class="btn btn-danger">delete</button>

        </form>

    </td>

</tr>

@endforeach

</table>



{!! $assignments->links() !!}
@endsection