@extends('layouts.app')

@section('title')
    Turn in assignment
@endsection

@section('content')


@if ($message = Session::get('success'))

<div class="alert alert-success">

    <div class="alert alert-success">

    <p>{{ $message }}</p>

    </div>

</div>

@endif

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Turn in</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('submissions.index') }}"> Back</a>

        </div>


        <br>
        <div class="pull-right">

            <b>File:</b>
            <a href="{{ url('download', $assignment->filename) }}">{{ $assignment->filename }}</a>

        </div>

    </div>

</div>

<form action="{{ route('submissions.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

     <div class="row">
        <div>
        <input type="hidden" name="assignment_id" value="{{ $id }}">
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6s">

            <div class="custom-file">
                <input type="file" name="file" id="file">
            </div>

        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-left">

            <button type="submit" class="btn btn-primary">Turn in</button>

        </div>

    </div>

</form>

@endsection
