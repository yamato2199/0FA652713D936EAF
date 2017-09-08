@extends('layouts/base')
@section('body')
<div class = "container">
    <h1>Edit shop</h1>
    <form action="{{route('shop.update', $shop->id)}}" method="POST">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class = "form-group">
            <label for = "shop_name">shop name</label>
            <input class = "form-control" type = "text" name = "shop_name" value = "{{$shop->shop_name}}">
        </div>
        <div class="form-group">
            <label for="shop_pic">shop_pic</label>
            <input class="form-control" type="text" name="shop_pic" value = "{{$shop->shop_pic}}">
        </div>
        <div class="form-group">
            <label for="shop_street_number">street num</label>
            <input class="form-control" type="number" name="shop_street_number" value = "{{$shop->shop_street_number}}">
        </div>
        <div class = "form-group">
            <label for = "shop_street">shop street</label>
            <input class = "form-control" type = "text" name = "shop_street" value = "{{$shop->shop_street}}">
        </div>
        <div class="form-group">
            <label for="shop_city">shop city</label>
            <input class="form-control" type="text" name="shop_city" value = "{{$shop->shop_city}}">
        </div>
        <div class="form-group">
            <label for="shop_state">shop state</label>
            <input class="form-control" type="text" name="shop_state" value = "{{$shop->shop_state}}">
        </div>
        <div class="form-group">
            <label for="shop_zipcode">shop zipcode</label>
            <input class="form-control" type="number" name="shop_zipcode" value = "{{$shop->shop_zipcode}}">
        </div>
        <div class="form-group">
            <label for="shop_country">shop country</label>
            <input class="form-control" type="number" name="shop_country" value = "{{$shop->shop_country}}">
        </div>
        <div class="form-group">
            <label for="user_id">user id</label>
            <input class="form-control" type="number" name="user_id" value = "{{$shop->user_id}}">
        </div>
        {{--<input type = "hidden" name = "notebook_id" value = "{{$id}}"--}}
        <input class = "btn btn-primary" type = "submit" value = "Done">
        </input>
    </form>
</div>
@endsection