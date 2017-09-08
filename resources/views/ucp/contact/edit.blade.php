@extends('layouts/base')
@section('body')
<div class = "container">
    <h1>Edit contact</h1>
    <form action="{{route('contact.update', $contact->id}}" method="POST">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class = "form-group">
            <label for = "cont_street_number">street number</label>
            <input class = "form-control" type = "text" name = "cont_street_number" value = "{{$contact->cont_street_number}}">
        </div>
        <div class="form-group">
            <label for = "cont_street">street</label>
            <input class = "form-control" type = "text" name = "cont_street" value = "{{$contact->cont_street}}">
        </div>
        <div class="form-group">
            <label for = "cont_city">city</label>
            <input class = "form-control" type = "text" name = "cont_city" value = "{{$contact->cont_city}}">
        </div>
        <div class="form-group">
            <label for = "cont_state">state</label>
            <input class = "form-control" type = "text" name = "cont_state" value = "{{$contact->cont_state}}">
        </div>
        <div class="form-group">
            <label for = "cont_zipcode">zipcode</label>
            <input class = "form-control" type = "text" name = "cont_zipcode" value = "{{$contact->cont_zipcode}}">
        </div>
        <div class="form-group">
            <label for = "cont_country">country</label>
            <input class = "form-control" type = "text" name = "cont_country" value = "{{$contact->cont_country}}">
        </div>
        <div class="form-group">
            <label for = "cont_phone">phone</label>
            <input class = "form-control" type = "text" name = "cont_phone" value = "{{$contact->cont_phone}}">
        </div>
        <div class="form-group">
            <label for = "cont_firstname">firstname</label>
            <input class = "form-control" type = "text" name = "cont_firstname" value = "{{$contact->cont_firstname}}">
        </div>
        <div class="form-group">
            <label for = "cont_lastname">lastname</label>
            <input class = "form-control" type = "text" name = "cont_lastname" value = "{{$contact->cont_lastname}}">
        </div>
        <div class="form-group">
            <label for = "cont_gender">gender</label>
            <input class = "form-control" type = "number" name = "cont_gender" value = "{{$contact->cont_gender}}">
        </div>
        <div class="form-group">
            <label for="cont_isdefault">isdefault</label>
            <input class="form-control" type="number" name="cont_isdefault" value = "{{$dish->cont_isdefault}}">
        </div>
        <input class = "btn btn-primary" type = "submit" value = "Done">
        </input>
    </form>
</div>
@endsection
