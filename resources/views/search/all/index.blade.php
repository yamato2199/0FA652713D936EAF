@extends('layouts/base')
@section('body')
    @if($result_shop->count())
        <h1>Shop ({{ $result_shop->count() }})</h1>
        <hr/>
        @foreach ($result_shop as $shops)
        
        <h2>{{ $shops->shop_name }} </h2>  

        @endforeach
        
    @endif
    {{-- DISH --}}
    @if($result_dish->count())
        <h1>Dish ({{ $result_dish->count() }})</h1>
        <hr/>
        @foreach ($result_dish as $dishs)
        
        <h2>{{ $dishs->dishName }} </h2>  

        @endforeach
        
    @endif
    
@endsection