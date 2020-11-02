<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

   <title>@yield('title')</title>

  <!-- Bootstrap core CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


</head>

<body>
  <div>
        <a class="btn btn-primary" href="{{ route('login') }}"> Đăng Xuất</a>
         @yield('name')
    </div>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><b>CLASSROOM</b> </div>
      <div class="list-group list-group-flush">
        <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action bg-light">USER</a>
        <a href="{{ route('messages') }}" class="list-group-item list-group-item-action bg-light">MESSAGES</a>
        <a href="{{route('assignments.index')}}"class="list-group-item list-group-item-action bg-light">ASSIGNMENTS</a>
        <a href="{{ route('challenges.index') }}" class="list-group-item list-group-item-action bg-light">CHALLENGES</a>
       
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
 
    @yield('content')
 

</body>

</html>