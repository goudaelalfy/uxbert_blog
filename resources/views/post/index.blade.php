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
                    
                    <div class="wrapper" style="width:98%">
                        
                        
                        
                        <div class="login posts animate form ">
                            <form  action="" autocomplete="on"> 
                                
                                @if(isset($user_posts))
                                <h1>{{trans('post.my_posts')}}</h1> 
                                @else
                                <h1>{{trans('post.all_posts')}}</h1> 
                                @endif
                                
                                @if(Session::has('error_message'))
				                    <center style="color: red;"> {{ Session::get('error_message') }}</center>
				                    <br/>
				                @elseif(Session::has('success_message'))
				                	<center style="color: green;"> {{ Session::get('success_message') }}</center>
				                    <br/>
				                @endif
				                    
                                @foreach($post_rows as $post_row)
                                
                                <div class="wrapper post_row">
                        			<div  class="login animate form post_row">
			                            <p> 
			                            	<h2>{{$post_row->title}}</h2> 
			                            	<label>{{substr($post_row->content,0,300)}}... <a href="{{url('post/'.$post_row->id)}}" class="" >{{trans('post.read_more')}}</a></label> 
		                                </p>
		                                <h3> {{trans('post.posted_by')}}: {{$post_row->user->first_name}} {{$post_row->user->last_name}} 
		                                 
		                                @if(\Session::get('user_id'))
			                                @if(\Session::get('user_id')==$post_row->user_id)
			                                <a href="{{url('post/'.$post_row->id.'/edit')}}" class="dv_right" >{{trans('post.edit')}}</a> 
			                                @endif
										@endif
		                                </h3>
		                                
		                               
			                        </div>									
			                    </div>
                                @endforeach
                                
                                
                            </form>
                            <center><?php echo $post_rows->render();?></center>
                        </div>
						
						
                        
						
                    </div>
                </div>  
            </section>
        
 @stop   