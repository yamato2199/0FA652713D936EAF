@extends('template/base')
@section('body')
<div class = "container">
    <h1>Edit dish</h1>
    <form action="{{route('ucp.dishs.update', $dish->id)}}" method="POST">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class = "form-group">
            <label for = "dishName">dish name</label>
            <input class = "form-control" type = "text" name = "dishName" value = "{{$dish->dishName}}">
        </div>
        <div class="form-group">
            <label for="dishPic">Pic test</label>
            <input class="form-control" type="text" name="dishPic" value = "{{$dish->dishPic}}">
        </div>
        <div class = "form-group">
            <label for = "price">price</label>
            <input class = "form-control" type = "number" name = "price" value = "{{$dish->price}}">
        </div>
        <div class="form-group">
            <label for="shop_id">shop id</label>
            <input class="form-control" type="number" name="shop_id" value = "{{$dish->shop_id}}">
        </div>
        <div class="form-group">
            <label for="avaible">ava</label>
            <input class="form-control" type="number" name="avaible" value = "{{$dish->avaible}}">
        </div>
        {{--<input type = "hidden" name = "notebook_id" value = "{{$id}}"--}}
        <input class = "btn btn-primary" type = "submit" value = "Done">
        </input>
    </form>
</div>
@endsection