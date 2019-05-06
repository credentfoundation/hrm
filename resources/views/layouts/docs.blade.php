<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HRM') }}|{{ $title}}</title>

    <!-- Styles -->
    <link href="{{ asset('css/data.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>

<body>
    <div id="app">
        @foreach($data as $d)

        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'HRM') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (\Session::has('emp_auth'))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ $d->firstname }}
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('employee.logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('employee.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>

                @endforeach
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{route('employee.profile')}}">Update Profile</a>

                        </li>
                        <li class="list-group-item">
                            <a href="{{route('documents.list')}}">Document links</a>

                        </li>
                        <li class="list-group-item">
                            <a href="{{route('employee.attendance')}}">Attendance</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-10">

                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Success!</strong> {{Session::get('success')}}
                    </div>
                    @endif

                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <div>
                                <b style="text-align: center;">All Documents</b>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                               

                                @yield('content')

                            </table>
                            
                        </div>

                    </div>
                </div>
            </div>
            
        </div>
</div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>



</body>

</html>