<?php

/**
 * Copyright (c) 2017 Gouda Elalfy, All Rights Reserved.
 *
 * @author        Gouda Elalfy <goudaelalfy@hotmail.com>
 * @link          http://stackoverflow.com/users/4675055/gouda-elalfy
 * @version       1.0
 */

?>

@extends("master")

@section('content')
            
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div class="wrapper post_form">
                    	
                    	
                        <div class="login animate form ">
                        	@if(isset($post))
                        	{!! Form::model($post,['method'=>'PATCH', 'files'=>true, 'action'=>['PostController@update',$post->id] , 'id' => 'create_form', 'class' => 'form-horizontal']) !!}
                        	<h1>{{trans('post.edit_post')}}</h1>
                        	@else
                            {!! Form::open( array('url'=>'post','method'=>'post',  'id' => 'create_form', 'autocomplete' => 'on')) !!}
                            <h1>{{trans('post.new_post')}}</h1> 
                            @endif    
                            
                                
                                
                                @if(Session::has('error_message'))
				                    <center style="color: red;"> {{ Session::get('error_message') }}</center>
				                    <br/>
				                @elseif(Session::has('success_message'))
				                	<center style="color: green;"> {{ Session::get('success_message') }}</center>
				                    <br/>
				                @endif
				                
				                @if (count($errors) > 0)
			                        <div class="alert alert-danger">
			                            <center style="color: red;">
			                            <ul>
			                                @foreach ($errors->all() as $error)
			                                    <li>{{ $error }}</li>
			                                @endforeach
			                            </ul>
			                            </center>
			                        </div>
			                        <br/>
			                    @endif
                    
                    			<p> 
                                <label for="title" class="uname" >{{trans('post.title')}}</label>
                                    {!! Form::text('title',null,['class'=>'form-control', 'id'=>'title','maxlength'=>'255','required'=>'required']) !!}
                                </p>
                                <p> 
                                    <label for="content" class="uname" >{{trans('post.content')}}</label>
                                    {!! Form::textarea('content',null,['id' => 'content', 'style'=>'width:94%; padding:10px;', 'rows' => 10]) !!}
                                </p>
                                <p class=" button"> 
                                    <input type="submit" value="{{trans('post.save')}}" />  
								</p>
                                
                                
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>  
            </section>
 @stop   