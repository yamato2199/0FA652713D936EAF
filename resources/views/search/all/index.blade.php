@extends('layouts/base')
@section('body')
    <div class="panel panel-default">
    <div class="panel-body">
    @if($result_shop->count())
        
        <h1>Shop <small>({{ $result_shop->count() }})</small></h1>
        <hr/>
        <div class="row">
            @foreach ($result_shop as $shops)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <a href="{{ route('shop.show',$shops->id) }}" style="color:black;"><img src="{{ $shops->shop_pic }}" ></a>
                        <div class="caption">
                            <h3><a href="{{ route('shop.show',$shops->id) }}" style="color:black;">{{ $shops->shop_name }}</a></h3>  
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
        <h1></span>Dish <small>({{ $result_dish->count() }})</small></h1>
        <hr/>
        <div class="row">
            @foreach ($result_dish as $dishs)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <a href="{{ route('shop.show',$dishs->shop_id) }}" style="color:black;"><img src="{{ $dishs->dishPic }}" ></a>
                        <div class="caption">
                            <h3><a href="{{ route('shop.show',$dishs->shop_id) }}" style="color:black;">{{ $dishs->dishName }} </a></h3>  
                            <p>{{ $dishs->dishDes}} </p>
                            
                            <h4 class="text-right">{{ $dishs->shop->shop_city }}</h4>
                            <h2 class="text-primary">${{ $dishs->price}}</h2>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    @endif

    </div>
    </div>
@endsection