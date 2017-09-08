@extends('layouts/base')
@section('body')
    <form action="{{ route('contact.store')}}" method="POST">
    	{{ csrf_field() }}

        <input class="form-control", placeholder="street number" name="cont_street_number">
        <input class="form-control", placeholder="street" name="cont_street">
        <input class="form-control", placeholder="city" name="cont_city">
        <input class="form-control", placeholder="state" name="cont_state">
        <input class="form-control", placeholder="zipcode" name="cont_zipcode">
        <input class="form-control", placeholder="country" name="cont_country">
        <input class="form-control", placeholder="phone" name="cont_phone">
        <input class="form-control", placeholder="firstname" name="cont_firstname">
        <input class="form-control", placeholder="lastname" name="cont_lastname">
        <input class="form-control", placeholder="gender" name="cont_gender">
        <input type="hidden" name="cont_isdefault" value="1">
        <input type="checkbox" name="cont_isdefault" value="0">


        <input type="hidden" name="user_id" value="{{$user}}">

        <input class="btn btn-primary" type="submit" value ="Create">
    </form>
@endsection
