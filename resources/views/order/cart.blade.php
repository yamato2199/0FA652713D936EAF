@extends('layouts/base')

@section('body')

    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Item</th>
                    <th></th>
                    <th class="text-center"></th>
                    <th class="text-center">Subtotal</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                {{-- $items->where('shop_id',1)->count() --}}
                @foreach($items as $itemObj)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{$itemObj->dish->dishPic}}" style="width: 100px; height: 72px;"> </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">{{$itemObj->dish->dishName}}</a></h4>
                                </div>
                            </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>${{$itemObj->dish->price}}</strong></td>
                        <td class="col-sm-1 col-md-1">
                            <a href="{{ route('order.remove',['id' => $itemObj->id]) }}"> <button type="button" class="btn btn-danger">
                                    <span class="fa fa-remove"></span> Remove
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>Total</h3></td>
                    <td class="text-right"><h3><strong>${{$total}}</strong></h3></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td>
                        <a href="{{ route('index') }}"> <button type="button" class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span> Back to shop
                            </button>
                        </a></td>
                    <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="fa fa-play"></span>
                        </button></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection