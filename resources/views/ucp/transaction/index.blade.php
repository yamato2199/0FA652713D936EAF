@extends('layouts.ucp')
@section('body')
<!--这里是标题“My Trasactions”-->
  <div class="am-cf am-padding am-padding-bottom-0">
  <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">My transactions</strong> <small>({{ $transactions->count() }})</small></div>
  </div>
  <hr>
  <div class="am-g">
    <!-- 标题工具栏 -->
    <div class="am-u-sm-12">
      @if($transactions->count())
      <table class="am-table am-table-striped am-table-hover table-main">
        <thead>
          <tr>
            <th class="table-type">ID</th>
            <th class="table-type">Shop</th>
            <th class="table-type">Total price</th>
            <th class="table-type">Transaction Time</th>
            <th class="table-type">Operation</th>
          </tr>
          <tbody>
            @php 
              $total=0;
            @endphp
            @foreach($transactions as $transaction)
              @php
                $total+=$transaction->transactionItems->Sum('dish_price');
              @endphp

              <tr>
                <td>
                  <a href = "{{ route("ucp.transaction.show", $transaction->id) }}">
                    {{ $transaction->id }}
                  </a>
                </td>

                <td>
                  {{ $transaction->shop_name }}
                </td>

                <td>
                  @if( Auth::user()->user_type == 1)
                    <span class="am-badge am-badge-success am-radius">+${{ $transaction->transactionItems->Sum('dish_price') }}</span>
                  @else
                    <span class="am-badge am-badge-danger am-radius">-${{ $transaction->transactionItems->Sum('dish_price') }}</span>
                  @endif
                  
                </td>

                <td>
                  {{ $transaction->created_at }}
                </td>
                <td>
                   
                  <div class="am-btn-toolbar">
                      <div class="am-btn-group am-btn-group-xs">
                      <a href="{{ route("ucp.transaction.show", $transaction->id) }}" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> View</a>
                      
                  
                      </div>
                  </div>
                              
                </td>
              </tr>
            @endforeach
          </tbody>
        </thead>
      </table>
        @if( Auth::user()->user_type == 1)
          <h1 class="am-pagination-right">Total: <span class="am-badge am-badge-success am-radius" style="font-size:25px;">+${{ $total }}</span></h1>
        @else
          <h1 class="am-pagination-right">Total: <span class="am-badge am-badge-danger am-radius" style="font-size:25px;">-${{ $total }}</span></h1>
        @endif
      @endif
    </div>
  </div>

@endsection
