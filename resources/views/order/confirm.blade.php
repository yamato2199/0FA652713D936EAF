@extends('layouts/base')
@section('body')
    <h1>Comfirm</h1>
    </hr>
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
    <form action="{{ route('transaction.create', $order->id ) }}" method="GET">
    @if($contacts->count())
    <table class="table table-striped">
        <thead>
            <tr>
                {{--<th class="table-id">ID</th>--}}
                <th>Receiver</th>
                <th>Address</th>
                <th>ZipCode</th>
                <th>Phone</th>
                <th>Use this address</th>
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
                     
                        @if( $contact->cont_isdefault )
                            <input type="radio" name="selected_address" value="{{ $contact->id }}" checked>
                        @else
                            
                            <input type="radio" name="selected_address"  value="{{ $contact->id }}">
                        @endif
                       
                    </td>
                

                </tr>
        
                @endforeach
            </tbody>
        </thead>
    </table>
    <h3>Addtional Note</h3>
    </hr>
    <div class="form-group">
        <textarea class="form-control" name="note" rows="7" cols="50" placeholder="Any addition note?"></textarea>
    </div>
    <button type="submit" class="btn btn-success pull-right" ><span class="glyphicon glyphicon-ok"></span> Confirm </button>
    @else
        <br/>
        <div class="panel panel-danger">
        <div class="panel-heading">Error</div>
        <div class="panel-body">
            <p>To process the transaction, you need to have at least 1 contact detail created in your accout. </p>
            <p><a href="{{ route('ucp.contact.index') }}">Click here</a> to create a new contact.</p>
        </div>
        </div>
        <!-- 无数据的时候提示 -->
        <button type="submit" class="btn btn-success pull-right" disabled><span class="glyphicon glyphicon-ok"></span> Confirm </button>
    @endif

        
    </form>

@endsection