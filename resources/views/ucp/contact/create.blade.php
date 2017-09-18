@extends('layouts/ucp')
@section('body')
        <!-- 标题 -->
	<div class="am-cf am-padding am-padding-bottom-0">
    	<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Create Contact</strong></div>
    </div>
    <hr/>


        <form class="am-form" action="{{ route('ucp.contact.store')}}" method="POST"  data-am-validator>
        {{ csrf_field() }}
            <fieldset>
                <div class="am-panel am-panel-default">
                    <div class="am-panel-hd">Personal information</div>
                        <div class="am-panel-bd">
                        <div class="am-form-group">

                            <input class="am-form-field am-radius" placeholder="firstname" name="cont_firstname" required>
                        </div>
                        <div class="am-form-group">
                            <input class="am-form-field am-radius" placeholder="lastname" name="cont_lastname" required>
                        </div>
                        <div class="am-form-group">
                            <input class="am-form-field am-radius" placeholder="phone" name="cont_phone" required>
                        </div>
                        {{--
                        <div class="am-form-group">
                            <input class="am-form-field am-radius" placeholder="gender" name="cont_gender" required>

                        </div>
                        --}}
                        <div class="am-form-group">
                        <label class="am-radio">
                            <input type="radio" name="cont_gender" value="0" data-am-ucheck checked>
                            Male
                        </label>
                        <label class="am-radio">
                            <input type="radio" name="cont_gender" value="1" data-am-ucheck>
                            Female
                        </label>
                        </div>
                    </div>
                </div>
               
                <div class="am-panel am-panel-default">
                    <div class="am-panel-hd">Enter your information</div>
                    <div class="am-panel-bd">
                        @include('google.autocomplete') {{-- 使用Google API 输入地址 --}}
                        <div class="am-form-group">
                            <input id="autocomplete" class="am-form-field am-radius" placeholder="Enter your new address" onFocus="geolocate()" type="text"></input>
                        </div>

                        <div class="am-form-group">
                            <input id="street_number" class="am-form-field am-radius" placeholder="street number" name="cont_street_number" required>
                        </div>
                        <div class="am-form-group">
                            <input id="route" class="am-form-field am-radius" placeholder="street" name="cont_street" required>
                        </div>
                        <div class="am-form-group">
                            <input id="locality" class="am-form-field am-radius" placeholder="city" name="cont_city" required>
                        </div>
                        <div class="am-form-group">
                            <input id="administrative_area_level_1" class="am-form-field am-radius" placeholder="state" name="cont_state" required>
                        </div>
                        <div class="am-form-group">
                            <input id="postal_code" class="am-form-field am-radius" placeholder="zipcode" name="cont_zipcode" required>
                        </div>
                        <div class="am-form-group">
                            <input id="country" class="am-form-field am-radius" placeholder="country" name="cont_country" required>
                        </div>
                    </div>
                </div>
    
                <input type="hidden" name="cont_isdefault" value="1">

                <input type="hidden" name="user_id" value="{{$user}}">

                <input class="am-btn am-btn-primary am-radius am-fr" type="submit" value ="Create">
            </fieldset>
                    
      
    </form>


   
@endsection
