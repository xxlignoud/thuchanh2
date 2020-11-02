@extends('layouts.app')

@section('title')
    Answer challenge
@endsection

@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
    <div class="pull-left">
    </div>
</div>
</div>

@if ($message = Session::get('success'))

<div class="alert alert-success">

    <textarea disabled>{{ $message }}</textarea>

</div>

@endif



<table class="table table-bordered" width="400">

<tr>

    <th width="400">Challenge name</th>

    <th>Hint</th>

</tr>


<tr>

    <td>{{ $challenge->challenge_name }}</td>

    <td>
        {{ $challenge->hint }}
    </td>
</tr>

</table>

<form action="{{ url('challenge-submit') }}" method="POST">

    @csrf

    <input type="hidden" name="challenge_id" value="{{ $challenge->id }}"> 
     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <input type="text" name="answer" class="form-control" placeholder="Type your answer">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>

   

</form>


@endsection