<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- TemplateBeginEditable name="doctitle" -->
    <title>SFO System</title>
    <!-- TemplateEndEditable -->
    <!-- TemplateBeginEditable name="head" -->
    <!-- TemplateEndEditable -->
    {{--<link rel="stylesheet" href="{{ asset('css/bootstrap-main-theme.css') }}"> 

    <link rel="stylesheet" href="{{ asset('css/dos-main-theme.css') }}">
    --}}
    
    

    <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
    
    @if (Session::has('style'))
        <link href="{{ asset('css/dos-main-theme.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/dos.css') }}" rel="stylesheet" type="text/css"> 
    @else
        <link href="{{ asset('css/bootstrap-main-theme.css') }}" rel="stylesheet" type="text/css">
    @endif


</head>

<body>

    @if (Session::has('style'))
        @include('addtional.dev')
    @endif
    <!-- 导航栏 -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('index')}}">SFO</a>
            </div>
            <div class="collapse navbar-collapse" id="example-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        {{--
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-log-in"></span> Login <b class="caret"></b>
                        </a>
                        --}}
                        @if (Auth::guest())
                        {{--<li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> Login</a></li>--}}
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                            <ul id="login-dp" class="dropdown-menu">
                                <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                            
                                                    <form class="form" role="form" accept-charset="UTF-8" id="login-nav" method="POST" action="{{ route('login') }}">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                                <input name="email" type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                                <input name="password" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                                                <div class="help-block text-right"><a href="{{ route('password.request') }}">Forget the password ?</a></div>
                                                        </div>
                                                        <div class="form-group">
                                                                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                                        </div>
                                                        <div class="checkbox">
                                                                <label>
                                                                <input type="checkbox"  name="remember" {{ old('remember') ? 'checked' : '' }}> keep me logged-in
                                                                </label>
                                                        </div>
                                                    </form>
                                            </div>
                                            <div class="bottom text-center">
                                                New here ? <a href="{{ route('register') }}"><b>Don't have account?</b></a>
                                            </div>
                                        </div>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li>
                        <a href="{{ route('ucp.notify.index') }}"><span class="glyphicon glyphicon-bell"></span> Notifications 
                            @if(Auth::user()->notifications->where('read',0)->count())
                                <span class="badge"> {{ Auth::user()->notifications->where('read',0)->count() }} </span>
                            @endif
                        </a>
                        </li>
                        @if( Auth::user()->user_type != 1)
                                <li><a href="{{ route('order.cart') }}">
                                <span class="glyphicon glyphicon-shopping-cart"></span>
                                Shopping Cart 
                                @if(Auth::user()->orders->count())
                                    <span class="badge"> {{ Auth::user()->orders->count() }} </span>
                                @endif
                                </a></li>
                        @endif
    
                         
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-user"></span>    {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('ucp.index') }}"><span class="glyphicon glyphicon-user"></span> UCP</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <span class="glyphicon glyphicon-log-in"></span>    Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <ul class="dropdown-menu">
                            <!--导航栏下拉 -->
                            <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Register</a></li> -->
                            <!-- Authentication Links -->
                       
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- 导航栏结束 -->

    <!-- TemplateBeginEditable name="MainContext" -->
    @yield('main')
    <div class="container-fluid">
    
        <div class="container">
            @yield('body')
        </div>
    </div>
    <!-- TemplateEndEditable -->

    <footer>
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <h5>Help</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">A</a></li>
                        <li><a href="#">B</a></li>
                        <li><a href="#">C</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Business</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">A</a></li>
                        <li><a href="#">B</a></li>
                        <li><a href="#">C</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contract</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">A</a></li>
                        <li><a href="/0x00">B</a></li>
                        <li><a href="/0xFF">C</a></li>
                    </ul>
                </div>

            </div>
    </footer>

</body>

</html>