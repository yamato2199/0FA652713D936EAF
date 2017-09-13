@extends('layouts/base')
@section('body')
    <h1>Comfirm</h1>

    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orderItems as $orderItem)
                <tr>
                    <td>{{ $orderItem->dish->dishName }}</td>
                    <td>${{ $orderItem->dish->price }}</td>
                    <td>
                        @php 
                        $qty = 0;
                        foreach($order->orderItemsQty as $j)
                        {
                                
                            if($j->dish_id == $orderItem->dish_id )
                            {
                                    $qty = $j->qty;
                            }
                        }
                        @endphp
                        {{  $qty }}
                    </td>
                                    
                    <td>
                        ${{  $qty * $orderItem->dish->price }}
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
    </div>

    <!-- 选择送货地址 -->
    <form action="" method="POST">
    @if($contacts->count())
    <table class="table table-striped">
        <thead>
            <tr>
                {{--<th class="table-id">ID</th>--}}
                <th>Receiver</th>
                <th>Address</th>
                <th>ZipCode</th>
                <th>Phone</th>
                <th>Set Default</th>
            </tr>
            </thead>

            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    {{--<td>{{ $contact->id }}</td>--}}
                    <td><a href="{{ route('ucp.contact.edit',$contact->id) }}">{{ $contact->cont_firstname }} {{ $contact->cont_lastname }}</a></td>
                    <td>{{ $contact->cont_street_number }}, {{ $contact->cont_street }}, {{ $contact->cont_city }}, {{ $contact->cont_state }}</td>
                    <td>{{ $contact->cont_zipcode }}</td>
                    <td>{{ $contact->cont_phone }}</td>
                   
                    <td>
                    
                        

                            <input type="hidden" id="df_{{ $contact->id }}" class="am-form-field am-radius" value="{{$contact->cont_isdefault}}" name="cont_isdefault" required> 
                            
                            @if( $contact->cont_isdefault )
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                            @else
                                
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                            @endif
                       
                    </td>
                

                </tr>
        
                @endforeach
            </tbody>
        </thead>
    </table>
    
 
    @else
        <br/>
        <div class="am-g">
            <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
                <div class="am-panel am-panel-default">
                    <div class="am-panel-hd">SYSTEM</div>
                        <div class="am-panel-bd">
                            You do not have any contact yet.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 无数据的时候提示 -->
        
    @endif
        <button type="submit" class="btn btn-success">Confirm <span class="fa fa-play"></span></button>
    </form>

@endsection