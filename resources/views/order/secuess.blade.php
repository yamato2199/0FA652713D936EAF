@extends('layouts/base')
@section('body')
    <h1>Order Secuessful</h1>

    <br/>
    <div class="panel panel-success">
        <div class="panel-heading">System</div>
            <div class="panel-body">
            <p>Your order has been ordered, thank you for your visit!</p>
            <a href="{{ route('index') }}" class="btn btn-success pull-right"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Back to home</a>
        </div>
    </div>

@endsection