<?php

/**
 * Copyright (c) 2017 Gouda Elalfy, All Rights Reserved.
 *
 * @author        Gouda Elalfy <goudaelalfy@hotmail.com>
 * @link          http://stackoverflow.com/users/4675055/gouda-elalfy
 * @version       1.0
 */

?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>{{trans('post.uxbert_blog_title')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="{{url('images/favicon.ico')}}"> 
        <link rel="stylesheet" type="text/css" href="{{url('css/demo.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{url('css/animate-custom.css')}}" />
		
		<script src="{{url('js/common.js')}}"></script>
    </head>
    <body>
    <div class="container">
            
            <div class="codrops-top">
                <header>
                <nav class="codrops-demos">
					<a href="{{url('')}}">{{trans('post.home')}}</a>
					
					@if(!\Session::get('user_id'))
					<a href="{{url('user/register')}}">{{trans('post.new_user')}}</a>
					<a href="{{url('user/login')}}">{{trans('post.login_to_send_post')}}</a>
					@else
					<a href="{{url('post/create')}}">{{trans('post.new_post')}}</a>
					<a href="{{url('post/userPosts')}}">{{trans('post.my_posts')}}</a>
					
					<a href="{{url('user/logout')}}">{{trans('user.log_out')}}</a>
					
					{{trans('user.welcome').' '.\Session::get('user_first_name').' '.\Session::get('user_last_name') }}
					@endif
					
					
				<img src="{{url('images/uxbert_logo.png')}}" class="dv_right" title="{{trans('post.uxbert_blog_title')}}"></img>
				</nav>
				
            	</header>
            	
            </div>
            
        @yield('content')
        
        </div>
        
    </body>
</html>