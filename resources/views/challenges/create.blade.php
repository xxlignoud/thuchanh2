@extends('layouts.app')

@section('title')
    New challenges
@endsection

@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Add New Challenge</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('challenges.index') }}"> Back</a>

        </div>

    </div>

</div>

   

@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

   

<form action="{{ route('challenges.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Challenge name:</strong>

                <input type="text" name="challenge_name" class="form-control" placeholder="Name">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Hint:</strong>

                <textarea class="form-control" style="height:50px" name="hint" placeholder=""></textarea>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Challenge file:</strong>

            <div class="custom-file">
                <input type="file" name="file" id="file">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>

   

</form>

@endsection
