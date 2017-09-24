@extends('layouts/base')
@section('body')

    <!-- seacrh -->
    <form action="{{ route('search.all') }}" post="get">
    
        <div class="row" style="padding: 15px;">
            <div class="col-md-10" style="margin: 0px; padding: 0px;">
                <input name="keyword" class="form-control" placeholder="Search any food / shop you want"/>
            </div>
            <div class="col-md-2" style="margin: 0px; padding: 0px;">
                <button class="btn btn-primary" style="width: 100%;" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        Search</button>
            </div>
        </div>
    </form>
    

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
    @if(!$result_dish->count() && !$result_shop->count())
    <div class="text-center" style="padding:100px;">
        <span class="glyphicon glyphicon-remove" style="font-size:100px;" aria-hidden="true"></span>
        <p>Sorry, there is nothing found, try to search something else?</p>
    
    </div>
    @endif
    </div>
    </div>
    
@endsection