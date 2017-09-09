@extends('layouts.ucp')
@section('body')
   <!-- 标题 -->
	<div class="am-cf am-padding am-padding-bottom-0">
    	<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Create Dish</strong></div>
    </div>
    <hr/>
    <div class="am-g">
		<div class="am-u-lg-11 am-u-sm-centered">
            <div class="am-panel am-panel-default">
                <div class="am-panel-hd">Dish information</div>
                    <div class="am-panel-bd">
                        <form class="am-form" action="{{ route('ucp.shop.dish.store',$shop) }}" method="POST" data-am-validator>
                            <fieldset>
                            {{ csrf_field() }}  
                                <div class="am-form-group">
                                    <input class="am-form-field am-radius" placeholder="Name" name="dishName" required> 
                                </div>
                            
                                <div class="am-form-group">
                                    <input class="am-form-field am-radius" placeholder="dishPic" name="dishPic" required> 
                                </div>
                                <div class="am-form-group">
                                    <input class="am-form-field am-radius" type="number" placeholder="price" name="price" required> 
                                </div>
                                <div class="am-form-group">
                                    <textarea class="am-form-field am-radius" placeholder="Description" name="dishDes" rows="5" required></textarea>
                                </div>
                                <div class="am-form-group">
                                    <input class="am-form-field am-radius" type="hidden" name="avaible" value="1">
                                </div>
                                <div class="am-form-group">
                                    <label class="am-checkbox-inline">
                                    <input type="checkbox" name="avaible" value="0" checked> Avaiable
                                    </label>
                                </div>
                                <input class="am-btn am-btn-primary am-radius am-fr" type="submit" value ="Create">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection