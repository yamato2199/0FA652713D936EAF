@extends('layouts.ucp')
@section('body')
  <!-- 标题 -->
    <div class="am-cf am-padding am-padding-bottom-0">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Transaction Details</strong> <small>(  {{ $transaction->transactionItems->count() }} )</small></div>
    </div>
  <!-- 标题 -->
  <hr>
    <div class="am-cf am-padding am-padding-bottom-0">

          <div class="am-panel am-panel-default">
            <div class="am-panel-hd">Customer Information</div>
            <div class="am-panel-bd">
              <table class="am-table">

              <tbody>

                  <tr>
                      <td>Transaction ID</td>
                      <td>{{ $transaction->id }}</td>
                  </tr>
                  <tr>
                      <td>Custoner Name</td>
                      <td>{{ $transaction->cust_name }}</td>
                  </tr>
                  <tr>
                      <td>Phone</td>
                      <td>{{ $transaction->cust_phone }}</td>
                  </tr>
                  <tr>
                      <td>Contact Address</td>
                      <td>{{ $transaction->cust_cont_address }}</td>
                  </tr>
                  <tr>
                      <td>Created Time</td>
                      <td>{{ $transaction->created_at }}</td>
                  </tr>
              </tbody>
              </table>
            </div>
          </div>

          <div class="am-panel am-panel-default">
          <div class="am-panel-hd">Shop Information</div>
            <div class="am-panel-bd">
              <table class="am-table">

              <tbody>

                  <tr>
                      <td>Shop Name</td>
                      <td>{{ $transaction->shop_name }}</td>
                  </tr>
                  <tr>
                      <td>Shop Address</td>
                      <td>{{ $transaction->shop_address }}</td>
                  </tr>
                  <tr>
                      <td>Phone</td>
                      <td>{{ $transaction->shop_phone }}</td>
                  </tr>
                  <tr>
                      <td>Addtional Note</td>
                      <td>{{ $transaction->note }}</td>
                  </tr>

              </tbody>
              </table>

            </div>

          </div>

          <div class="am-panel am-panel-default">
          <div class="am-panel-hd">Order Items</div>
          <div class="am-panel-bd">

            <table class="am-table">
              <thead>
                  <tr>
                      <th>Item</th>
                      <th>Price</th>

                  </tr>
              </thead>
              <tbody>
                  @foreach($transaction->transactionItems as $itm )
                  <tr>
                      <td>{{  $itm->dish_name }}</td>
                      <td>${{ $itm->dish_price }}</td>

                  </tr>
                  @endforeach
              </tbody>
            </table>
            <h1 class="am-pagination-right">Total: ${{ $transaction->transactionItems->sum('dish_price') }}</h1>

          </div>
        </div>
</div>
@endsection
