@extends('layouts/base')
@section('body')
    
    @if($result_shop->count())
        
        <h1>Shop ({{ $result_shop->count() }})</h1>
        <hr/>
        <div class="row">
            @foreach ($result_shop as $shops)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="{{ $shops->shop_pic }}" >
                        <div class="caption">
                            <h3>{{ $shops->shop_name }} </h3>  
                            <p>{{ $shops->shop_des }} </p>
                            <h4 class="text-right">{{ $shops->shop_city }}</h4>
                        </div>
                    </div>
                    
                </div>
            @endforeach
        </div>
    @endif
    
    {{-- DISH --}}
    @if($result_dish->count())
        <h1></span>Dish ({{ $result_dish->count() }})</h1>
        <hr/>
        <div class="row">
            @foreach ($result_dish as $dishs)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="..." >
                        <div class="caption">
                            <h3>{{ $dishs->dishName }} </h3>  
                            <p>{{ $dishs->dishDes}} </p>
                            
                            <h4 class="text-right">{{ $dishs->shop->shop_city }}</h4>
                            <h4 class="text-primary">${{ $dishs->price}}</h4>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    @endif
    
@endsection