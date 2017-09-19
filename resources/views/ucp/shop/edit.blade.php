@extends('layouts.ucp')

@section('body')

	<!-- 标题 -->
	<div class="am-cf am-padding am-padding-bottom-0">
    	<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Edit for shop</strong> <small>{{$shop->shop_name}}</small></div>
    </div>
    <hr/>
	<!-- 标题 -->

    <div class="am-g">
        <div class="am-u-sm-12">
        <!-- 选项卡 -->
            <div class="am-tabs" data-am-tabs>
                <ul class="am-tabs-nav am-nav am-nav-tabs">
                    <li class="am-active"><a href="#tab1">General Information</a></li>
                    <li><a href="#tab2">Shop Address</a></li>
                 
                </ul>

                <div class="am-tabs-bd">
                    <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                        <form class="am-form" action="{{route('ucp.shop.update', $shop->id)}}" method="POST" enctype="multipart/form-data" data-am-validator>
                            <fieldset>
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class = "form-group">
                                <label for = "shop_name">shop name</label>
                                <input class="am-form-field am-radius" type = "text" name = "shop_name" value = "{{$shop->shop_name}}" required>
                            </div>
                            <div class="am-form-group">
                                <label for = "shop_phone">Phone</label>
                                <input type="number" class="am-form-field am-radius", placeholder="Phone Number" value = "{{$shop->shop_phone}}" name="shop_phone" required> 
                            </div>
                            {{--
                            <div class="form-group">
                                <label for="shop_pic">shop_pic</label>
                                <input class="am-form-field am-radius" type="text" name="shop_pic" value = "{{$shop->shop_pic}}" required>
                            </div>
                            --}}
                            <p>
                                <img src="{{$shop->shop_pic}}"  class="am-img-thumbnail am-radius"  width="140" height="140"/>
                            </p>
                            <div class="am-form-group am-form-file">
                                <button type="button" class="am-btn am-btn-primary am-btn-sm">
                                    <i class="am-icon-cloud-upload"></i> Select file...</button>
                                <input id="doc-form-file" type="file" name="shop_pic" value="{{$shop->shop_pic}}" accept="image/*">
                            </div>
                                <div id="file-list"></div>
                                <script>
                                $(function() {
                                    $('#doc-form-file').on('change', function() {
                                    var fileNames = '';
                                    $.each(this.files, function() {
                                        fileNames += '<span class="am-badge">' + this.name + '</span> ';
                                    });
                                    $('#file-list').html(fileNames);
                                    });
                                });
                                </script>
                            <div class = "form-group">
                                <label for = "shop_des">Description</label>
                                <input class="am-form-field am-radius" type = "text" name = "shop_des" value = "{{$shop->shop_des}}" required>
                            </div>
  
                            {{--<input type = "hidden" name = "notebook_id" value = "{{$id}}"--}}
                            <p><button class="am-btn am-btn-primary am-radius am-fr" type = "submit">Update</button></p>
                            </fieldset>
                        </form> 
                    </div>
                    <div class="am-tab-panel am-fade" id="tab2">
                        <form class="am-form" action="{{route('ucp.shop.update', $shop->id)}}" method="POST">
                             <fieldset>
                                {{csrf_field()}}
                                {{method_field('PUT')}}

                                @include('google.autocomplete') {{-- 使用Google API 输入地址 --}}
                                <div id="locationField">
                                    <input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text"></input>
                                </div>

                                <div class="form-group">
                                    <label for="shop_street_number">Street Number</label>
                                    <input id="street_number" class="am-form-field am-radius" type="number" name="shop_street_number" value = "{{$shop->shop_street_number}}" required>
                                </div>
                                <div class = "form-group">
                                    <label for = "shop_street">Street</label>
                                    <input id="route" class="am-form-field am-radius" type = "text" name = "shop_street" value = "{{$shop->shop_street}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="shop_city">City</label>
                                    <input id="locality" class="am-form-field am-radius" type="text" name="shop_city" value = "{{$shop->shop_city}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="shop_state">State</label>
                                    <input id="administrative_area_level_1" class="am-form-field am-radius" type="text" name="shop_state" value = "{{$shop->shop_state}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="shop_zipcode">Zipcode</label>
                                    <input id="postal_code" class="am-form-field am-radius" type="number" name="shop_zipcode" value = "{{$shop->shop_zipcode}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="shop_country">Country</label>
                                    <input id="country" class="am-form-field am-radius" type="text" name="shop_country" value = "{{$shop->shop_country}}" required>
                                </div>
                     
                                <p><button class="am-btn am-btn-primary am-radius am-fr" type = "submit">Update</button></p>
                            </fieldset>
                        </form>
                    </div>
                   
                </div>
            </div>

        <!-- 选项卡 -->
        </div>
    </div>

{{--
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

        <input class = "btn btn-primary" type = "submit" value = "Done">
        </input>
    </form>
</div>
--}}
@endsection