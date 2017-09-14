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
          </tr>
          <tbody>
            @foreach($transactions as $transaction)
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
                  $这里是总价
                </td>

                <td>
                  {{ $transaction->created_at }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </thead>
      </table>
      @endif
    </div>
  </div>

@endsection
