@extends('layouts/base')
@section('body')
<div class="row">
   <div class="col-sm-12 col-md-10 col-md-offset-1">
      {{-- $items->where('shop_id',1)->count() --}}
      @if(!$orders->count())
        <div class="panel panel-default">
        <div class="panel-heading">System</div>
        <div class="panel-body">
          <p>You do not have any item in your cart.</p>
          <a href="{{ route('index') }}" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Back to home</a>
        </div>
      </div>
      @endif
      @foreach($orders as $order)
      <h1> {{ $order->shop->shop_name }}</h1>
      <table class="table table-hover">
         <thead>
            <tr>
               <th>Item</th>
               <th></th>
               <th class="text-center"></th>
               <th class="text-center">Subtotal</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
      @foreach($order->orderItems as $orderItem)
      
            <tr>
               <td class="col-sm-8 col-md-6">
                  <div class="media">
                     <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{$orderItem->dish->dishPic}}" style="width: 100px; height: 72px;"> </a>
                     <div class="media-body">
                        <h4 class="media-heading"><a href="#">{{$orderItem->dish->dishName}}</a></h4>
                     </div>
                  </div>
               </td>
               <td class="col-sm-1 col-md-1" style="text-align: center">
               </td>
               <td class="col-sm-1 col-md-1 text-center"></td>
               <td class="col-sm-1 col-md-1 text-center"><strong>${{$orderItem->dish->price}}</strong></td>
               <td class="col-sm-1 col-md-1">
                  <a href="{{ route('order.remove',['id' => $orderItem->id]) }}"> <button type="button" class="btn btn-danger">
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
               <td>
                  <h3>Total</h3>
               </td>
               <td class="text-right">
                @php
                $total=0;
                foreach($order->orderItems as $item){
                    $total+=$item->dish->price;
                }
                @endphp
                  <h3><strong>${{$total}}</strong></h3>
               </td>
            </tr>
            <tr>
               <td>   </td>
               <td>   </td>
               <td>   </td>
               <td>
                  <a href="{{ route('index') }}"> <button type="button" class="btn btn-default">
                  <span class="fa fa-shopping-cart"></span> Back to shop
                  </button>
                  </a>
               </td>
               <td>
               <form action="{{ route('order.comfirm',$order->id) }}" method="POST">
										{{csrf_field()}}
                    <button type="submit" class="btn btn-success">
                      Checkout <span class="fa fa-play"></span>
                    </button>
							</form>  
               </td>
            </tr>
         </tbody>
      </table>
      @endforeach
   </div>
</div>
@endsection