@extends('layouts.ucp')
@section('body')
	<!-- 标题 -->
	<div class="am-cf am-padding am-padding-bottom-0">
    	<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Delivery Address</strong> <small>({{ $contacts->count() }})</small></div>
    </div>
	<!-- 标题 -->
    <hr>

	<div class="am-g">
		<!-- 标题工具栏 -->
		<div class="am-u-sm-12 am-u-md-6">
			<div class="am-btn-toolbar">
				<div class="am-btn-group am-btn-group-xs">
					<a href="{{ route('ucp.contact.create') }}" type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> New Address</a>
				</div>
			</div>
		</div>
		<!-- 标题工具栏 -->
		<!-- 店家表格 -->
		<div class="am-g">
			<div class="am-u-sm-12">
				@if($contacts->count())
				<table class="am-table am-table-striped am-table-hover table-main">
					<thead>
						<tr>
							{{--<th class="table-id">ID</th>--}}
							<th class="table-title">Receiver</th><th class="table-type">Address</th><th class="table-author am-hide-sm-only">ZipCode</th><th class="table-date am-hide-sm-only">Phone</th><th class="table-set">Operation</th><th class="table-set">Set Default</th>
						</tr>
						</thead>
						<tbody>
							@foreach($contacts as $contact)
							<tr>
								{{--<td>{{ $contact->id }}</td>--}}
								<td><a href="{{ route('ucp.contact.edit',$contact->id) }}">{{ $contact->cont_firstname }} {{ $contact->cont_lastname }}</a></td>
								<td>{{ $contact->cont_street_number }}, {{ $contact->cont_street }}, {{ $contact->cont_city }}, {{ $contact->cont_state }}</td>
								<td class="am-hide-sm-only">{{ $contact->cont_zipcode }}</td>
								<td class="am-hide-sm-only">{{ $contact->cont_phone }}</td>
								<td>
								<div class="am-btn-toolbar">
									<div class="am-btn-group am-btn-group-xs">
									<a href=" {{ route('ucp.contact.edit', $contact->id ) }}" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> Edit</a>
									<form action="{{route('ucp.contact.destroy', $contact->id)}}" class="pull-xs-right5 card-link" method="POST" style="display:inline">
										{{csrf_field()}}
										{{method_field('DELETE')}}
										<button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" type="submit"><span class="am-icon-trash-o"></span> Delete</button>
									</form>
								
									</div>
								</div>
								</td>
                                <td>
                                   
                                    <form class="am-form" action="{{ route('ucp.contact.default', $contact->id) }}" method="POST">
                                        {{csrf_field()}}
										
                                        <input type="hidden" id="df_{{ $contact->id }}" class="am-form-field am-radius" value="{{$contact->cont_isdefault}}" name="cont_isdefault" required> 
                                        
                                        @if( $contact->cont_isdefault )
                                            <button id="btn_df_{{ $contact->id }}" class="am-btn am-btn-primary" type="submit" disabled>Default</button>
                                        
                                        @else
                                            <button id="btn_df_{{ $contact->id }}" class="am-btn am-btn-default" type="submit" >Default</button>
                                        @endif
                                    </form>
                                    <script>
                                        $('#btn_df_{{ $contact->id }}').click(function () {
                                            //alert(this.checked ? "YES" : "NO");
                                            $("#df_{{ $contact->id }}").val(1);
                                        });

                                    </script>
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
				<!-- 店家表格 -->
			</div>
		</div>
	</div>
@endsection