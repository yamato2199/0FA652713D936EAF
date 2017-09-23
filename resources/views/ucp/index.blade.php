@extends('layouts.ucp')
@section('body')
<!-- 标题 -->
<div class="am-cf am-padding am-padding-bottom-0">
   <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Home</strong></div>
</div>
<hr/>
<ul class="am-avg-sm-1 am-avg-md-2 am-margin am-padding am-text-center admin-content-list ">
   <li><a href="#" class="am-text-success"><span class="am-icon-btn am-icon-file-text"></span><br/>Orders<br/>{{ Auth::user()->transactions->count() }}</a></li>
   <li><a href="#" class="am-text-warning"><span class="am-icon-btn am-icon-briefcase"></span><br/>User Type<br/>{{ Auth::user()->type() }}</a></li>
</ul>
@if(Auth::user()->transactions->count())
<div class="am-u-md-6">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
   <div class="am-panel am-panel-default">
      <div class="am-panel-hd">Amount</div>
      <div class="am-panel-bd">
         <canvas id="myChart" height="100%"></canvas>
      </div>
   </div>
</div>
<script>
   var ctx = document.getElementById("myChart").getContext('2d');
   var myChart = new Chart(ctx, {
       type: 'bar',
       data: {
           labels: [
               @foreach (Auth::user()->transactions as $trans)
                   "{{ $trans->created_at }}",
               @endforeach
            ],
           datasets: [{
               label: '# Amount',
               data: [
                   @foreach (Auth::user()->transactions as $trans)
                       {{ $trans->transactionItems->Sum('dish_price')  }},
                   @endforeach
               ],
               backgroundColor: 'rgba(94, 185, 94, 0.2)',
   
               borderColor: 'rgba(94,185,94,1)',
    
             
               borderWidth: 1
           }]
       },
       options: {
           scales: {
               yAxes: [{
                   ticks: {
                       beginAtZero:true
                   }
               }]
           }
       }
   });
</script>
<div class="am-u-md-6">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
   <div class="am-panel am-panel-default">
      <div class="am-panel-hd">Transactions</div>
      <div class="am-panel-bd">
         <canvas id="myChart2" height="100%"></canvas>
      </div>
   </div>
</div>
<script>
   var ctx = document.getElementById("myChart2").getContext('2d');
   var myChart = new Chart(ctx, {
       type: 'line',
       data: {
           labels: [
               @foreach (Auth::user()->transactions as $trans)
                   "{{ $trans->created_at }}",
               @endforeach
            ],
           datasets: [{
               label: ' $',
               data: [
                   @foreach (Auth::user()->transactions as $trans)
                   {{ $trans->transactionItems->Sum('dish_price')  }},
                   @endforeach
               ],
               backgroundColor: 'rgba(243, 123, 29, 0.2)',
               
               borderColor: 'rgba(243, 123, 29, 1)',
               
               borderWidth: 1
           }]
       },
       options: {
           scales: {
               yAxes: [{
                   ticks: {
                       beginAtZero:true
                   }
               }]
           }
       }
   });
</script>
@endif
<div class="am-cf am-padding am-padding-bottom-0">
   <table class="am-table am-table-bd am-table-striped admin-content-table">
      <thead>
         <tr>
            <th>Order ID</th>
            <th>Shop</th>
            <th>Shop Address</th>
            <th>Total Price</th>
            <th>Operation</th>
         </tr>
      </thead>
      <tbody>
         @foreach(Auth::user()->transactions as $trans)
         <tr>
            <td>{{$trans->id}}</td>
            <td>{{$trans->shop_name}}</td>
            <td>
               {{$trans->shop_address}}
            </td>
            <td>
               @if( Auth::user()->user_type == 1)
               <span class="am-badge am-badge-success am-radius">+${{ $trans->transactionItems->Sum('dish_price') }}</span>
               @else
               <span class="am-badge am-badge-danger am-radius">-${{ $trans->transactionItems->Sum('dish_price') }}</span>
               @endif
            </td>
            <td>
               <div class="am-dropdown" data-am-dropdown>
                  <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                  <ul class="am-dropdown-content">
                     <li><a href="{{route("ucp.transaction.show", $trans->id)}}">View</a></li>
                  </ul>
               </div>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
   <div class="am-panel am-panel-default">
      <div class="am-panel-hd ">
         <h3 class="am-panel-title" data-am-collapse="{target: '#notify-1'}">
            Recent Notifications <span class="am-icon-chevron-down am-fr" ></span>
         </h3>
      </div>
      <div id="notify-1" class="am-panel-collapse am-collapse am-in">
         <div class="am-panel-bd">
            @if(!Auth::user()->notifications->count())
            <div class="am-g">
               <div class="am-u-sm-12">
                  <h2 class="am-text-center am-text-xxxl am-margin-top-lg am-text-primary">Nothing Found!</h2>
                  <img class="am-center" src="{{ Asset('res/img/404.png') }}"></img>
               </div>
            </div>
            @endif
            @foreach(Auth::user()->notifications->take(5) as $note)
            <article class="am-comment">
               <a href="#link-to-user-home">
               <img src="" alt="" class="am-comment-avatar" width="48" height="48"/>
               </a>
               <div class="am-comment-main">
                  <header class="am-comment-hd">
                     <!--<h3 class="am-comment-title">评论标题</h3>-->
                     <div class="am-comment-meta">
                        <a href="#" class="am-comment-author">{{ $note->sender->name }}</a>
                        Send at <time>{{ $note->created_at }}</time>
                     </div>
                  </header>
                  <div class="am-comment-bd">
                     <p>
                        {{ $note->body }}
                     </p>
                  </div>
               </div>
            </article>
            <br/>
            @endforeach
         </div>
      </div>
   </div>
</div>
@endsection