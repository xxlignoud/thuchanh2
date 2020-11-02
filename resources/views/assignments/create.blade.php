@extends('layouts.app')


@section('title')
    New Assignment
@endsection


@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Add New Assignment</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('assignments.index') }}"> Back</a>

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

   

<form action="{{ route('assignments.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

     <div class="row">

        <div class="col-xs-6 col-sm-6 col-md-6">

            <div class="form-group">

                <strong>Due to</strong>

                <input type="text" name="due_to" class="form-control" placeholder="Due to">

            </div>

        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">

            <div class="form-group">

                <strong>Description</strong>

                <input type="text" name="description" class="form-control" placeholder="Description">

            </div>

        </div>

        <div class="col-xs-6 col-sm-6 col-md-6s">

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