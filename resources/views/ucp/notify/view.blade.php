@extends('layouts.ucp')
@section('body')
	<!-- 标题 -->
	<div class="am-cf am-padding am-padding-bottom-0">
    	<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Notification - {{ $notefication->title }}</strong> </div>
        
    </div>
    <hr/>
    <div class="am-cf am-padding am-padding-bottom-0">
        <!-- 详细讯息 -->
        <div class="am-panel am-panel-default">
            <div class="am-panel-hd">
                <h3 class="am-panel-title">{{ $notefication->title }}</h3></div>
            <div class="am-panel-bd">
                <article class="am-comment">
                    <a href="#link-to-user-home">
                        <img src="" alt="" class="am-comment-avatar" width="48" height="48"/>
                    </a>

                    <div class="am-comment-main">
                        <header class="am-comment-hd">
                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                        <div class="am-comment-meta">
                            <a href="#link-to-user" class="am-comment-author">{{ $notefication->sender->name }}</a>
                            Send at <time>{{ $notefication->created_at }}</time>
                        </div>
                        </header>

                        <div class="am-comment-bd">
                        <p>{{ $notefication->body }}</p>
                        </div>
                    </div>
                </article>  
                <br/>
                    <div class="am-pagination-right"><a href="{{ route('ucp.notify.mark',$notefication->id) }}" class="am-btn am-btn-primary" role="button">Mark as read</a> </div>
                
            </div>
        </div>
    </div>
@endsection