@extends('layouts.app')

@section('title')
    Challenges
@endsection


@section('content')
<div class="row">

<div class="col-lg-12 margin-tb">

    <div class="pull-left">

        <h2>Challenges</h2>

    </div>


    <div class="pull-right">

        <a class="btn btn-success" href="{{ route('challenges.create') }}">New</a>

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

    <th width="280px">Challenge name</th>

    <th width="280px">#</th>

</tr>

@foreach ($challenges as $challenge)

<tr>

    <td>{{ $challenge->challenge_name }}</td>



    <td>

        <form action="{{ route('challenges.destroy',$challenge->id) }}" method="POST">

            <a class="btn btn-info" href="{{ route('challenges.show',$challenge->id) }}">detail</a>

            @csrf

            @method('DELETE')

            <button type="submit" class="btn btn-danger">delete</button>

        </form>

    </td>

</tr>

@endforeach

</table>



{!! $challenges->links() !!}
@endsection
