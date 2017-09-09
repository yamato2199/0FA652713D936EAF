@extends('layouts.ucp')
@section('body')
	<!-- 标题 -->
	<div class="am-cf am-padding am-padding-bottom-0">
    	<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">My Shops</strong> <small>({{ $shops->count() }})</small></div>
    </div>
	<!-- 标题 -->
    <hr>

	<div class="am-g">
		<!-- 标题工具栏 -->
		<div class="am-u-sm-12 am-u-md-6">
			<div class="am-btn-toolbar">
				<div class="am-btn-group am-btn-group-xs">
					<a href="{{ route('ucp.shop.create') }}" type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> New Shop</a>
				</div>
			</div>
		</div>
		<!-- 标题工具栏 -->
		<!-- 店家表格 -->
		<div class="am-g">
			<div class="am-u-sm-12">
				@if($shops->count())
				<table class="am-table am-table-striped am-table-hover table-main">
					<thead>
						<tr>
							<th class="table-id">ID</th><th class="table-title">Name</th><th class="table-type">Surbub</th><th class="table-author am-hide-sm-only">State</th><th class="table-date am-hide-sm-only">Create Date</th><th class="table-set">Operation</th>
						</tr>
						</thead>
						<tbody>
							@foreach($shops as $shop)
							<tr>
								<td>{{ $shop->id }}</td>
								<td><a href="{{route("ucp.shop.show", $shop->id)}}">{{ $shop->shop_name }}</a></td>
								<td>{{ $shop->shop_city }}</td>
								<td class="am-hide-sm-only">{{ $shop->shop_state }}</td>
								<td class="am-hide-sm-only">{{ $shop->created_at }}</td>
								<td>
								<div class="am-btn-toolbar">
									<div class="am-btn-group am-btn-group-xs">
									<a href="{{route("ucp.shop.edit", $shop->id)}}" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> Edit</a>
									<form action="{{route('ucp.shop.destroy', $shop->id)}}" class="pull-xs-right5 card-link" method="POST" style="display:inline">
										{{csrf_field()}}
										{{method_field('DELETE')}}
										<button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" type="submit"><span class="am-icon-trash-o"></span> Delete</button>
									</form>
								
									</div>
								</div>
								</td>
							</tr>

							@endforeach
						</tbody>
					</thead>
				</table>
				@else
					<br/>
					<div class="am-g">
						<div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
							<div class="am-panel am-panel-default">
								<div class="am-panel-hd">SYSTEM</div>
									<div class="am-panel-bd">
										You do not have create any shop.
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- 无数据的时候提示 -->
					
				@endif
				<!-- 店家表格 -->
			</div>
		</div>
	</div>
			

	{{--
	测试用代码 -- 
		<h1>shop</h1>
	@foreach($shops as $shop)
		<h2><a href="{{route("shop.show", $shop->id)}}">{{ $shop->shop_name }}</a></h2>
		<ul>
			<li>{{ $shop->shop_pic }}</li>
			<li>{{ $shop->shop_street_number }}</li>
			<li>{{ $shop->shop_street }}</li>
            <li>{{ $shop->shop_city }}</li>
            <li>{{ $shop->shop_state }}</li>
            <li>{{ $shop->shop_zipcode }}</li>
            <li>{{ $shop->shop_country }}</li>
            <li>{{ $shop->user_id }}</li>

		</ul>
		<form action="{{route('shop.destroy', $shop->id)}}" class="pull-xs-right5 card-link" method="POST" style="display:inline">
            {{csrf_field()}}
			{{method_field('DELETE')}}
			<input class="btn btn-sm btn-danger" type="submit" value="Delete">	
		</form>
		<a href="{{route("shop.edit", $shop->id)}}"><!--这里是notebook传回来的id数据-->
			Edit shop
		</a>
	@endforeach
	--}}
@endsection