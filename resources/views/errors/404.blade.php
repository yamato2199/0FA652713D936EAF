@extends('layouts.base')

@section('body')
    <div class="panel panel-default">
  <div class="panel-heading">Error {{$exception->getMessage()}}</div>
  <div class="panel-body">
    <p>The request page is not found.</p>

  </div>
</div>
    
@endsection