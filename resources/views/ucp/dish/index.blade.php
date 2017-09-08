@extends('template/base')
@section('body')
	<h1>Dish</h1>

	@foreach($dishs as $dish)
		<a href=""><h2>{{ $dish->dishName }}</h2></a>
		<ul>
			<li>{{ $dish->price }}</li>
			<li>{{ $dish->shop_id }}</li>
			<li>{{ $dish->avaible }}</li>

		</ul>
		<form action="{{ route('shop.dish.destroy', $dish->shop_id )}}" class="pull-xs-right5 card-link" method="POST" style="display:inline">
            {{csrf_field()}}
			{{method_field('DELETE')}}
			
			<input class="btn btn-sm btn-danger" type="submit" value="Delete">	
		</form>
	@endforeach

@endsection