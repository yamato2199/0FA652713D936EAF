@extends('layouts.ucp')

@section('body')

    <!-- 标题 -->
	<div class="am-cf am-padding am-padding-bottom-0">
    	<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Create Shop</strong></div>
    </div>
    <hr/>

    <form id="create_form" class="am-form" action="{{route('ucp.shop.store')}}" method="POST" enctype="multipart/form-data" data-am-validator>
        <fieldset>
            {{ csrf_field() }}
            <!-- 折叠面板 -->
            <div class="am-panel-group" id="accordion">
                <div class="am-panel am-panel-default">
                    <div class="am-panel-hd">
                        <h4 class="am-panel-title" data-am-collapse="{parent: '#accordion', target: '#Generan-info'}">
                            General Information
                        </h4>
                    </div>
                    <!-- 店家普通讯息 -->
                    <div id="Generan-info" class="am-panel-collapse am-collapse am-in" >
                        <div class="am-panel-bd">
                            <div class="am-form-group">
                                <input class="am-form-field am-radius", placeholder="Name" name="shop_name" required> 
                            </div>
                            <div class="am-form-group">
                                <input type="number" class="am-form-field am-radius", placeholder="Phone Number" name="shop_phone" required> 
                            </div>
                            {{--
                            <div class="am-form-group">
                                <input class="am-form-field am-radius", placeholder="Shop Pic" name="shop_pic" required> 
                                <input type="file" name="shop_pic" id="file">
                            </div>
                            --}}
                            <div class="am-form-group am-form-file">
                                <button type="button" class="am-btn am-btn-primary am-btn-sm">
                                    <i class="am-icon-cloud-upload"></i> Select file...</button>
                                <input id="doc-form-file" type="file" name="shop_pic" accept="image/*">
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
                           
                            <div class="am-form-group">
                                <input class="am-form-field am-radius", placeholder="shop_des" name="shop_des" required> 
                            </div>

                        </div>
                    </div>
                </div>
                    <!-- 店家地址 -->
                <div class="am-panel am-panel-default">
                    <div class="am-panel-hd">
                        <h4 class="am-panel-title" data-am-collapse="{parent: '#accordion', target: '#Address-field'}">
                            Shop Address
                        </h4>
                    </div>
                    <!-- 店家普通讯息 -->
                    <div id="Address-field" class="am-panel-collapse am-collapse am-in">
                        <div class="am-panel-bd">
                            @include('google.autocomplete') {{-- 使用Google API 输入地址 --}}
                            <div id="locationField">
                                <input id="autocomplete" placeholder="Enter your new address" onFocus="geolocate()" type="text"></input>
                            </div>

                            <div class="form-group">
                                <label for="shop_street_number">Street Number</label>
                                <input id="street_number" class="am-form-field am-radius" type="number" name="shop_street_number" required>
                            </div>
                            <div class = "form-group">
                                <label for = "shop_street">Street</label>
                                <input id="route" class="am-form-field am-radius" type = "text" name = "shop_street" required>
                            </div>
                            <div class="form-group">
                                <label for="shop_city">City</label>
                                <input id="locality" class="am-form-field am-radius" type="text" name="shop_city" required>
                            </div>
                            <div class="form-group">
                                <label for="shop_state">State</label>
                                <input id="administrative_area_level_1" class="am-form-field am-radius" type="text" name="shop_state" required>
                            </div>
                            <div class="form-group">
                                <label for="shop_zipcode">Zipcode</label>
                                <input id="postal_code" class="am-form-field am-radius" type="number" name="shop_zipcode" required>
                            </div>
                            <div class="form-group">
                                <label for="shop_country">Country</label>
                                <input id="country" class="am-form-field am-radius" type="text" name="shop_country" required>
                            </div>
                        </div>
                    </div>
                </div>       
            
                
            </div>
            <!-- 折叠面板 -->
            
            
            <p><button class="am-btn am-btn-primary am-radius am-fr" type = "submit">Create</button></p>
        </fieldset>
    </form>
    
    <script>
        // 处理异步验证结果
        $(function() {
            $('#create_form').validator({
            
                onInValid: function(validity) {
                    alert("Hello! I am an alert box!");
                    $('#Address-field').collapse('open');
                    $('#Generan-info').collapse('open');
                }
            });
        });
        /*
        
        $.when($('#create-form').validator('isFormValid')).then(function() {
        // 验证成功的逻辑
        }, function() {
        // 验证失败的逻辑
            $('#Address-field').collapse('open');
            $('#Generan-info').collapse('open');
        });
        */
        
    </script>
    
	<!-- 标题 -->
    {{--
    <form action="{{route('shop.store')}}" method="POST">
    	{{ csrf_field() }}

        <input class="form-control", placeholder="Name" name="shop_name"> 
        <input class="form-control", placeholder="shop_des" name="shop_des"> 
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
    --}}
@endsection