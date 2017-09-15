@extends('layouts.ucp')
@section('body')
	<!-- 标题 -->
	<div class="am-cf am-padding am-padding-bottom-0">
    	<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">My Notifications</strong> <small>({{  Auth::user()->notifications->count() }})</small></div>
    </div>
    <!-- 提示列表 -->
    <div class="am-g">
            <div class="am-u-sm-12">
                @if(Auth::user()->notifications->count())
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                        <tr>
                            <th class="table-title">Tite</th><th class="table-type">Body</th><th class="table-author am-hide-sm-only">From</th><th class="table-date am-hide-sm-only">Create Date</th><th class="table-set">Operation</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach(Auth::user()->notifications as $msg)
                            <tr>
                              
                                <td>
                                    <a href="{{ route('ucp.notify.view',['id' => $msg->id ] ) }}">{{ $msg->title }}</a> 
                                    
                                    @if(!$msg->read) 
                                        <a class="am-badge am-badge-success am-radius">New!</a>
                                    @endif
                                </td>
                                <td>{{ $msg->body }}</td>
                                <td class="am-hide-sm-only">{{ $msg->sender->name }}</td>
                               
                                <td class="am-hide-sm-only">{{ $msg->created_at }}</td>
                                <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                    <a href="{{ route('ucp.notify.view',['id' => $msg->id ] ) }}" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> View</a>
                                    <a href="{{ route('ucp.notify.mark',$msg->id) }}" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-check"></span> Mark as read</a>
                                
                                    </div>
                                </div>
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
                                        You do not have any message.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 无数据的时候提示 -->
                    
                @endif
            </div>
        </div>
@endsection