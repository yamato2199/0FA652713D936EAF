@extends('layouts/ucp')
@section('body')
    <div class="am-cf am-padding am-padding-bottom-0">
    	<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Edit Contact</strong></div>
    </div>
    <hr/>
<div class = "container">
    <form action="{{route('ucp.contact.update', $contact->id) }}" method="POST">
    <fieldset>
        {{csrf_field()}}
        {{method_field('PUT')}}
                        <div class="am-panel am-panel-default">
                    <div class="am-panel-hd">Personal information</div>
                        <div class="am-panel-bd">
                        <div class="am-form-group">
                            <input class="am-form-field am-radius" placeholder="firstname" value="{{ $contact->cont_firstname }}" name="cont_firstname" required>
                        </div>
                        <div class="am-form-group">
                            <input class="am-form-field am-radius" placeholder="lastname" value="{{ $contact->cont_lastname }}" name="cont_lastname" required>
                        </div>
                        <div class="am-form-group">
                            <input class="am-form-field am-radius" placeholder="phone" value="{{ $contact->cont_phone }}" name="cont_phone" required>
                        </div>
                        <div class="am-form-group">
                            <label class="am-radio">
                                @if($contact->cont_gender == 0)
                                    <input type="radio" name="cont_gender" value="0" data-am-ucheck checked>
                                @else
                                    <input type="radio" name="cont_gender" value="0" data-am-ucheck >
                                @endif
                                Male
                            </label>
                            <label class="am-radio">
                                @if($contact->cont_gender == 1)
                                    <input type="radio" name="cont_gender" value="1" data-am-ucheck checked>
                                @else
                                    <input type="radio" name="cont_gender" value="1" data-am-ucheck>
                                @endif
                                Female
                            </label>
                        </div>
                    </div>
                </div>
               
                <div class="am-panel am-panel-default">
                    <div class="am-panel-hd">Address Information</div>
                    <div class="am-panel-bd">
                        @include('google.autocomplete') {{-- 使用Google API 输入地址 --}}
                        <div class="am-form-group">
                            <input id="autocomplete" class="am-form-field am-radius" placeholder="Enter your new address" onFocus="geolocate()" type="text"></input>
                        </div>
                        <div class="am-form-group">
                            <input id="street_number" class="am-form-field am-radius" placeholder="street number" value="{{ $contact->cont_street_number }}" name="cont_street_number" required>
                        </div>
                        <div class="am-form-group">
                            <input id="route" class="am-form-field am-radius" placeholder="street" value = "{{ $contact->cont_street }}" name="cont_street" required>
                        </div>
                        <div class="am-form-group">
                            <input id="locality" class="am-form-field am-radius" placeholder="city" value = "{{ $contact->cont_city }}" name="cont_city" required>
                        </div>
                        <div class="am-form-group">
                            <input id="administrative_area_level_1" class="am-form-field am-radius" placeholder="state" value = "{{ $contact->cont_state }}" name="cont_state" required>
                        </div>
                        <div class="am-form-group">
                            <input id="postal_code" class="am-form-field am-radius" placeholder="zipcode" value = "{{ $contact->cont_zipcode }}" name="cont_zipcode" required>
                        </div>
                        <div class="am-form-group">
                            <input id="country" class="am-form-field am-radius" placeholder="country" value = "{{ $contact->cont_country }}" name="cont_country" required>
                        </div>
                    </div>
                </div>
        <input class="am-btn am-btn-primary am-radius am-fr" type = "submit" value = "Done">
        </input>
        </fieldset>
    </form>
</div>
@endsection
