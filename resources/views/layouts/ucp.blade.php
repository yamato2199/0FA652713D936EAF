<!-- UCP 模板 -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amaze UI Admin index Examples</title>
  <meta name="description" content="Index">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="UCP/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="{{ asset('UCP/i/app-icon72x72@2x.png') }}">
  <meta name="apple-mobile-web-app-title" content="UCP" />
  <link rel="stylesheet" href="{{ asset('UCP/css/amazeui.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('UCP/css/admin.css') }}">
  <style>
    .am-btn-toolbar a {
        background-color: white;
    }

  </style>
    <!--[if lt IE 9]>
  <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
  <script src="assets/js/amazeui.ie8polyfill.min.js"></script>
  <![endif]-->

  <!--[if (gte IE 9)|!(IE)]><!-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

  <!--<![endif]-->
  <script src="{{ asset('UCP/js/amazeui.min.js') }}"></script>
  <script src="{{ asset('UCP/js/app.js') }}"></script>
</head>

<body>
<header class="am-topbar am-topbar-inverse admin-header">
  <div class="am-topbar-brand">
    <a href="{{ route('ucp.index') }}"><strong>SFO</strong> <small>UCP Panel</small></a>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">Switch</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      	<li><a href="{{ route('ucp.notify.index') }}"><span class="am-icon-bell"></span> Notification 
        @if(Auth::user()->notifications->where('read',0)->count() )
          <span class="am-badge am-badge-warning">{{  Auth::user()->notifications->where('read',0)->count()  }}</span></a></li>
        @endif
      	<li class="am-dropdown" data-am-dropdown>
	        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
	          	<span class="am-icon-user"></span> {{ Auth::user()->name }} <span class="am-icon-caret-down"></span>
	        </a>
	        <ul class="am-dropdown-content">
	          	<li><a href="{{ route('ucp.contact.index') }}"><span class="am-icon-user"></span> Settings</a></li>
	          	<li><a href="{{ route('index') }}"><span class="am-icon-cog"></span> Main Site</a></li>
	          	<li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="am-icon-power-off"></span> Logout</a>
              </li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
	        </ul>
      	</li>
    
  </div>
</header>
<!-- Header -->

<div class="am-cf admin-main">
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li>
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-user"></span> Profile <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          	<ul class="am-list am-collapse admin-sidebar-sub " id="collapse-nav">
	            <li><a href="{{ route('ucp.index') }}" class="am-cf"><span class="am-icon-info"></span> General Info</a></li> 
	            @if( Auth::user()->user_type == 0)
                <li><a href="{{ route ('ucp.contact.index') }}" class="am-cf"><span class="am-icon-home"></span> Delivery Address</a></li> 
	        	  @endif
              {{-- M@lisa has done nothing!!! <li><a href="admin-user.html" class="am-cf"><span class="am-icon-paypal"></span> Payment Settings</a></li> --}}
	        	
          	</ul>
        </li>

        
        @if( Auth::user()->user_type == 1)
        <!-- Shop管理页面 -->
        <li>
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav1'}"><span class="am-icon-archive"></span> Shops<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          	<ul class="am-list am-collapse admin-sidebar-sub " id="collapse-nav1">
	            <li><a href="{{ route('ucp.shop.index') }}" class="am-cf"><span class="am-icon-archive"></span> My Shops</a></li> 
          	</ul>
        </li>
        <!-- Order管理 -->  
        <li>
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav3'}"><span class="am-icon-shopping-cart"></span> Order Management<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          	<ul class="am-list am-collapse admin-sidebar-sub " id="collapse-nav3">
	            <li><a href="{{ route('ucp.transaction.index') }}" class="am-cf"><span class="am-icon-list"></span> View Orders</a></li> 
          	</ul>
        </li>
        @endif
        
        @if( Auth::user()->user_type == 0)
        <li>
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav2'}"><span class="am-icon-shopping-cart"></span> Transaction<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          	<ul class="am-list am-collapse admin-sidebar-sub " id="collapse-nav2">
              <li><a href="{{ route('order.cart') }}" class="am-cf"><span class="am-icon-shopping-cart"></span> View Shopping Cart</a></li> 
	            <li><a href="{{ route('ucp.transaction.index') }}" class="am-cf"><span class="am-icon-list"></span> View Transactions</a></li> 
          	</ul>
        </li>
        @endif
        
      </ul>
      <form class="am-form">
        <fieldset>
          <button href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="width:100%;" class="am-btn am-btn-danger"><span class="am-icon-power-off"></span> Log Out</button>
        </fieldset>
      </form>



    </div>
  </div>
  <!-- sidebar end -->

  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
    
    @yield('body')

    </div>

    <footer class="admin-content-footer">
      <hr>
      <p class="am-padding-left"> SEP Project 2017</p>
    </footer>
  </div>
  <!-- content end -->
  <!-- 手机界面呼出按钮 -->
  <a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>



</body>
</html>




