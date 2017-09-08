@extends('layouts/base')
@section('body')
	<h1>Dish</h1>

	@foreach($dishs as $dish)
		<h2>{{ $dish->dishName }}</h2>
		<ul>
			<li>{{ $dish->price }}</li>
			<li>{{ $dish->shop_id }}</li>
			<li>{{ $dish->avaible }}</li>

		</ul>
		<a href="{{ route('shop.dish.edit',['shop'=>$dish->shop_id,'dish'=>$dish->id]) }}">
        	Edit Dish
        </a>
		<form action="{{ route('shop.dish.destroy',['shop'=>$dish->shop_id,'dish'=>$dish->id]) }}" class="pull-xs-right5 card-link" method="POST" style="display:inline">
		{{-- 不优雅:( <form action="{{url('ucp/shop/'.$dish->shop_id.'/dish/'.$dish->id) }}" class="pull-xs-right5 card-link" method="POST" style="display:inline"> --}}
            {{csrf_field()}}
			{{method_field('DELETE')}}
			
			<input class="btn btn-sm btn-danger" type="submit" value="Delete">	
		</form>
	@endforeach

@endsection