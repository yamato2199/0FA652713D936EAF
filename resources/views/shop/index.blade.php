@extends('layouts.base')


@section('main')
<script src="{{ asset('js/jquery.bootstrap-touchspin.js') }}"></script>
<link href="{{ asset('css/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css">

<div class="container-fluid" >
    <div class="container">
        <div class="row">
             <div class="col-md-8"><h1>{{ $Shop->shop_name }}</h1><p>{{ $Shop->shop_des }}</p></div>
             <div class="col-md-2 text-center" ><h4>Area</h4><h3>{{ $Shop->shop_city }}</h3></div>
             <div class="col-md-2 text-center"><h4>Rating</h4><h3>
             <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
             <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
             <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
             <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
             

             </h3></div>
        </div>
    </div>
</div>

<div class="container-fluid">
        <div class="container">
        <!-- 商家二级菜单 -->
        <br/><br/>
        

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Main Menus</a></li>
            <li role="presentation"><a href="#comment" aria-controls="comment" role="tab" data-toggle="tab">Comments</a></li>
            <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab" id="Contact">Contact</a></li>
        </ul>
        <div class="panel panel-default">
        <div class="panel-body">
        <!-- 商家二级菜单 -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
            <h3>Main Menus</h3>
            <hr/>
                
       
                <!-- 菜品列表(每行2列) -->
                <div class="row">
                    @foreach( $Shop->dishs as $dish )
                    

                        <div class="col-md-6"> 
                            <div class="thumbnail">
                                <img src="..." >
                                <div class="caption">
                                    <div class="media">
                                    <div class="media-left">
                                        
                                    <img class="media-object" style="width:150px; height:150px;" src="{{ $dish->dishPic }}">
                                    
                                    </div>
                                    <div class="media-body">
                                    <form id="fm-{{ $dish->id }}" action="{{route('order.add',['shopId' => $Shop->id , 'dishId' => $dish->id]) }}" method="POST" > 
                                        {{ csrf_field() }}
                                       


                                        <h4 class="media-heading">{{ $dish->dishName }}</h4>
                                        <p>{{ $dish->dishDes }}</p>
                                        {{--<button class="btn btn-primary pull-right">Add to cart</button> --}}
                                        {{-- <input name="qty" id="incr-{{ $dish->id }}" style="font-size:20px;" type="text" value="0" >--}}
                        

                                        <h2 class="text-primary">${{ $dish->price }}</h2>

                                        
                                        @if(!Auth::guest() && Auth::user()->user_type == 1) 
                                            <button id="btn_{{ $dish->id }}" type="submit" class="btn btn-primary  pull-right" disabled><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to cart</button> 
                                        @else 
                                            <button id="btn_{{ $dish->id }}" type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" ></span> Add to cart</button> 
                                        @endif

                                    </form>
                                    {{--
                                    <script>
                                        var form = new FormData(document.getElementById('login-form'));
                                        fetch("/login", {
                                        method: "POST",
                                        body: form
                                        });
                                    </script>
                                    --}}
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- JS -->
                        <script>
                            $("#incr-{{ $dish->id }}").TouchSpin();
                        </script>
                    
                    
                    @endforeach
                </div>
                <!-- 菜品列表 -->

               
            </div>
            <div role="tabpanel" class="tab-pane" id="comment">.ddd.</div>
            <div role="tabpanel" class="tab-pane" id="contact">
                <h3>Address</h3>
                <hr/>
                <h4>
                <div id="shop_address">
                {{ $Shop->shop_street_number }},
                {{ $Shop->shop_street }},
                {{ $Shop->shop_city }},
                {{ $Shop->shop_state }},
                {{ $Shop->shop_zipcode }},
                {{ $Shop->shop_country }}
                </div>
                <h4>Phone: {{ $Shop->shop_phone }}</h4>
                </h4>
                
                <div id="map" style="height: 500px;">saw</div>
                <!-- Google Map(估计代码很坑，因为是JS) -->
                
                <script>
                
                </script>
                <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCAHMEsT8SxFopteetKsuwQjUbpUBtjj4&callback=initMap"></script>
                
               
                
            </div> 
            </div> 
            </div>
        </div>
        
    </div>
    <script>
    $('#Contact').click(function (e) {
        e.preventDefault();
        //绘制Canvas
        var marker =null;
        var map = null;
        
        function initMap() {
           
            map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: {lat: -34.397, lng: 150.644}
            });
            var geocoder = new google.maps.Geocoder();
                     
            setTimeout(function() {
                google.maps.event.trigger(map, 'resize');
                geocodeAddress(geocoder, map);
            }, 200);
            
            //geocodeAddress(geocoder, map);
        }

        function geocodeAddress(geocoder, resultsMap) {
            var address = document.getElementById('shop_address').innerHTML;
            geocoder.geocode({'address': address}, function(results, status) {
            if (status === 'OK') {
                resultsMap.setCenter(results[0].geometry.location);
                marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
                });
                
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
            });
        }
        initMap();
        

    });
    
    </script>
</div>

@endsection