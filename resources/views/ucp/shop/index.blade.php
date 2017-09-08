@extends('template/base')
@section('body')
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

@endsection