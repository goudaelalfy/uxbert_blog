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
                    <div class="wrapper">
                    	
                    	
                        <div class="login animate form">
                            {!! Form::open( array('url'=>'user/login',  'id' => 'create_form', 'autocomplete' => 'on')) !!} 
                                <h1>{{trans('user.log_in')}}</h1>
                                
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
                                    <label for="email" class="uname" data-icon="u" > {{trans('user.your_email')}} </label>
                                    {!! Form::email('email',null,['class'=>'form-control', 'id'=>'email','maxlength'=>'225','required'=>'required', 'placeholder'=>'goudaelalfy@hotmail.com']) !!}
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> {{trans('user.your_password')}} </label>
                                    {!! Form::password('password',null,['class'=>'form-control', 'id'=>'password','required'=>'required', 'placeholder'=>'eg. X8df!90EO']) !!} 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">{{trans('user.keep_me_logged_in')}}</label>
								</p>
                                <p class=" button"> 
                                    <input type="submit" value="{{trans('user.login')}}" /> <a href="{{url('user/forgetPassword')}}" class="dv_right" >{{trans('user.forget_your_password')}}</a> 
								</p>
                                
                                
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>  
            </section>
 @stop   