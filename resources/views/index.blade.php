@extends('template/base') 
@section('body')
<div class="row">
    <div class="text-center" style="margin-left: auto; margin-right: auto; margin-top: 100px; margin-bottom: 120px;">

        <h1 class="text-center">XXXXXX</h1>
        <form style="margin-top: 50px; margin-left: 20px; margin-right: 20px; " id="form_banner">
            <div class="row">
                <div class="col-md-2" style="margin: 0px; padding: 0px; margin-top: 5px;">
                    <select class="form-control">
                        <option>Hurstville</option>
                        <option>Rockdale</option>
                        <option>City</option>
                    </select>
                </div>
                <div class="col-md-8" style="margin: 0px; padding: 0px; margin-top: 5px;">
                    <input class="form-control" />
                </div>
                <div class="col-md-2" style="margin: 0px; padding: 0px; margin-top: 5px;">
                    <button class="btn btn-primary" style="width: 100%;" type="submit">Search</button>
                </div>
            </div>

        </form>

    </div>
</div>
@endsection