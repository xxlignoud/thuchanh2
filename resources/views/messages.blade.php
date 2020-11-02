@extends('layouts.app')
@section('title')
    Messages
@endsection
@section('content')
<div class="row col-8">
    <table class="table table-bordered">

    <tr>

        <th>Time</th>

        <th>Content</th>

        <th>From</th>


    </tr>

    @foreach ($messages as $message)

    <tr>

        <td>{{ $message->created_at }}</td>

        <td>{{ $message->content }}</td>

        <td>{{ $message->name_student }}</td>

    </tr>

    @endforeach

    </table>
 </div>   
@endsection
