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
    <link rel="stylesheet" href="{{ asset('css/bootstrap-main-theme.css') }}">
    <link href="{{ asset('css/bootstrap-main-theme.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/search.css') }}" rel="stylesheet" type="text/css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    

</head>

<body>
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
                        <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                        @else
                        <li><a href="{{ route('order.cart') }}"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart <span class="badge"> 0 </span></a></li>
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
                        <li><a href="#">d</a></li>
                        <li><a href="#">C</a></li>
                    </ul>
                </div>

            </div>
    </footer>

</body>

</html>