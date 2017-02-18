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
                                <h1>{{trans('post.all_posts')}}</h1> 
                                
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
			                            	<label>{{substr($post_row->content,0,300)}}...</label>
			                            	
			                            	<br/><br/>
		                                    <h3> {{trans('post.posted_by')}}: {{$post_row->user->first_name}} {{$post_row->user->last_name}}<h3>
		                                </p>
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