@extends('layouts.ucp')
@section('body')
	<!-- 标题 -->
	<div class="am-cf am-padding am-padding-bottom-0">
    	<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">My Dishes</strong> <small>({{ $dishs->count() }})</small></div>
    </div>
	<!-- 标题 -->
    <hr>



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
		{{-- 不优雅:( <form action="{{url('ucp/shop/'.$dish->shop_id.'/dish/'.$dish->id) }}" class="pull-xs-right5 card-link" method="POST" style="display:inline"> --}}
            {{csrf_field()}}
			{{method_field('DELETE')}}
			
			<input class="btn btn-sm btn-danger" type="submit" value="Delete">	
		</form>
	@endforeach

@endsection