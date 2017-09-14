@extends('layouts.ucp')
@section('body')
	<!-- 标题 -->
	<div class="am-cf am-padding am-padding-bottom-0">
    	<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">My Dishes</strong> <small>({{ $dishs->count() }})</small></div>
    </div>
	<!-- 标题 -->
    <hr>
	<div class="am-g">
		<!-- 标题工具栏 -->
		<div class="am-u-sm-12 am-u-md-6">
			<div class="am-btn-toolbar">
				<div class="am-btn-group am-btn-group-xs">
					<a href="{{ route('ucp.shop.dish.create',$shop->id) }}" type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> New Dish</a>
				</div>
			</div>
		</div>
		<!-- 标题工具栏 -->
	</div>
	<!-- 店家表格 -->
	<div class="am-g">
		<div class="am-u-sm-12">
			@if($dishs->count())
			<table class="am-table am-table-striped am-table-hover table-main">
				<thead>
					<tr>
						<th class="table-id">ID</th><th class="table-title">Name</th><th class="table-type">Description</th><th class="table-author am-hide-sm-only">Price</th><th class="table-date am-hide-sm-only">Aviable</th><th class="table-date am-hide-sm-only">Create Date</th><th class="table-set">Operation</th>
					</tr>
					</thead>
					<tbody>
						@foreach($dishs as $dish)
						<tr>
							<td>{{ $dish->id }}</td>
							<td><a href="{{route('ucp.shop.dish.edit',['shop'=>$dish->shop_id,'dish'=>$dish->id])}}">{{ $dish->dishName }}</a></td>
							<td>{{ $dish->dishDes }}</td>
							<td class="am-hide-sm-only">${{ $dish->price }}</td>
							<td class="am-hide-sm-only">
							@if($dish->avaible) <a class="am-badge am-badge-success am-radius">Aviable</a>
							@else <a class="am-badge am-badge-danger am-radius">Not Aviable</a>
							@endif
							</td>
							<td class="am-hide-sm-only">{{ $dish->created_at }}</td>
							<td>
							<div class="am-btn-toolbar">
								<div class="am-btn-group am-btn-group-xs">
								<a href="{{ route('ucp.shop.dish.edit',['shop'=>$dish->shop_id,'dish'=>$dish->id]) }}" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> Edit</a>
								<form action="{{route('ucp.shop.dish.destroy',['shop'=>$dish->shop_id,'dish'=>$dish->id])}}" class="pull-xs-right5 card-link" method="POST" style="display:inline">
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
									You do not have create any dish.
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- 无数据的时候提示 -->
				
			@endif
		</div>
	</div>
	{{--
	<h1>Dish</h1>

	@foreach($dishs as $dish)
		<h2>{{ $dish->dishName }}</h2>
		<ul>
			<li>{{ $dish->price }}</li>
			<li>{{ $dish->shop_id }}</li>
			<li>{{ $dish->avaible }}</li>

		</ul>
		<a href="{{ route('ucp.shop.dish.edit',['shop'=>$dish->shop_id,'dish'=>$dish->id]) }}">
        	Edit Dish
        </a>
		<form action="{{ route('ucp.shop.dish.destroy',['shop'=>$dish->shop_id,'dish'=>$dish->id]) }}" class="pull-xs-right5 card-link" method="POST" style="display:inline">
		
            {{csrf_field()}}
			{{method_field('DELETE')}}
			
			<input class="btn btn-sm btn-danger" type="submit" value="Delete">	
		</form>
	@endforeach
	--}}
{{-- 不优雅:( <form action="{{url('ucp/shop/'.$dish->shop_id.'/dish/'.$dish->id) }}" class="pull-xs-right5 card-link" method="POST" style="display:inline"> --}}
@endsection