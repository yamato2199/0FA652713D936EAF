@extends('layouts/base')
@section('body')
    <form action="{{route('shop.store')}}" method="POST">
    	{{ csrf_field() }}

        <input class="form-control", placeholder="Name" name="shop_name"> 
        <input class="form-control", placeholder="Shop Pic" name="shop_pic"> 
        <input class="form-control", placeholder="num" name="shop_street_number"> 
        <input class="form-control", placeholder="street" name="shop_street"> 
        <input class="form-control", placeholder="city" name="shop_city"> 
        <input class="form-control", placeholder="state" name="shop_state"> 
        <input class="form-control", placeholder="zipcode" name="shop_zipcode"> 
        <input class="form-control", placeholder="country" name="shop_country">
        <input class="form-control", placeholder="id" name="user_id">
        <input class="btn btn-primary" type="submit" value ="Create">
    </form>
@endsection