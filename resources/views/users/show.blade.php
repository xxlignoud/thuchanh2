@extends('layouts.app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show User    </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row col-4" align="center">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                {{ $user->username }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fullname:</strong>
                {{ $user->fullname }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                {{ $user->phone }}
            </div>
        </div>
       
    </div>
    <div class="col-6">
        <form action="{{url('message/store')}}" method="post">
            {{ csrf_field() }}
            <div class="col-md-12">
                <input type="hidden" name="sent_to_id" class="form-control" value="{{ $user->id }}">
                <input type="hidden" name="name_student" class="form-control" value="{{ $user->username }}">
                <!-- Message Form Input -->
                <div class="form-group">
                    <label class="control-label">Message</label>
                    <textarea name="content" class="form-control"></textarea>
                </div>
                <!-- Submit Form Input -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Send</button>
                </div>
            </div>
        </form>
        </div>
    </div>

     </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <b>Message sent to " {{ $user->username }} "</b>
                <table class="table table-bordered">
                <tr>
                    <th>Time</th>
                    <th>Content</th>
                    <th width="280px">#</th>
                </tr>
                @foreach ($messages as $message)
                <tr>
                    <td>{{ $message->created_at }}</td>
                    <td>{{ $message->content }}</td>
                    <td>
                           <form action="{{ url('message/'.$message->id) }}" method="POST">
                            <!-- <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">edit</a> -->
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </table>
        </div>
    </div>

  @endsection